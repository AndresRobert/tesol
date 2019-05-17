<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2018-04-09
 * Time: 16:03
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class RegistrationsController extends AppController
{
    var $uses = array('Conference', 'Setup', 'Registration', 'User');
    public $components = array('RequestHandler');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add', 'show', 'qrcode');
    }

    public function index() {
        $registrations = $this->Registration->find('all');
        $users = $this->User->find('list', array('fields' => array('id', 'username')));
        $_SESSION['csv']['registration'] = $registrations;
        $this->set('registrations', $registrations);
        $this->set('total_registrations', count($registrations));
        $this->set('users', $users);
    }

    public function export()
    {
        $this->response->download("export.csv");
        $data = $this->Registration->find('all');
        $this->set(compact('data'));
        $this->layout = 'ajax';
        return;
    }
    
    public function report()
    {
        $registrations = $this->Registration->find('all');
        $this->set(compact('$registrations'));
        
        $total = count($registrations);
        $attended = $this->Registration->find('all', array('fields' => array('count(attendance_count) AS total'), 'conditions' => array('attendance_count > ' => 0)));
        $amount = $this->Registration->find('all', array('fields' => array('sum(amount_paid) AS total'), 'conditions' => array('amount_paid > ' => 9999)));
        $this->set('total', $total);
        $this->set('attended', $attended);
        $this->set('amount', $amount);
        
        $presenters = count($this->Registration->find('all', array('conditions' => array('occupation' => 'Presenter'))));
        $teachers = count($this->Registration->find('all', array('conditions' => array('occupation' => 'Teacher'))));
        $students = count($this->Registration->find('all', array('conditions' => array('occupation' => 'Student'))));
        $piaps = count($this->Registration->find('all', array('conditions' => array('occupation' => 'Piap'))));
        $embassies = count($this->Registration->find('all', array('conditions' => array('occupation' => 'Embassy'))));
        $keynotes = count($this->Registration->find('all', array('conditions' => array('occupation' => 'Keynote Speaker'))));
        $others = count($this->Registration->find('all', array(
            'conditions' => array(
                'not' => array('occupation' => array(
                    'Keynote Speaker', 'Embassy', 'Piap', 'Student', 'Teacher', 'Presenter'
                ))
            )
        )));
        $this->set('presenters', $presenters);
        $this->set('teachers', $teachers);
        $this->set('students', $students);
        $this->set('piaps', $piaps);
        $this->set('embassies', $embassies);
        $this->set('keynotes', $keynotes);
        $this->set('others', $others);
        
        /*
        $students_total = $this->Registration->find('all');
        $students_attended = $this->Registration->find('all');
        $students_amount = $this->Registration->find('all');
        $this->set(compact('$students_total'));
        $this->set(compact('$students_attended'));
        $this->set(compact('$students_amount'));
        
        $others_total = $this->Registration->find('all');
        $others_attended = $this->Registration->find('all');
        $others_amount = $this->Registration->find('all');
        $this->set(compact('$others_total'));
        $this->set(compact('$others_attended'));
        $this->set(compact('$others_amount'));
        
        $special_total = $this->Registration->find('all');
        $special_attended = $this->Registration->find('all');
        $this->set(compact('$special_total'));
        $this->set(compact('$special_attended'));
        */
    }

    public function view($id = null) {
        $this->Registration->id = $id;
        if (!$this->Registration->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->Registration->findById($id));
    }

    public function add() {
        $this->layout = 'ajax';
        $this->render(false);
        $response = array('status' => 'failed', 'data' => $_POST);
        if (!empty($_POST)) {
            $salt = 'tesol90125';
            $data['Registration']['conferences_id'] = $_POST['conferences_id'];
            $data['Registration']['first_name'] = $_POST['first_name'];
            $data['Registration']['last_name'] = $_POST['last_name'];
            $data['Registration']['country'] = $_POST['country'];
            $data['Registration']['id_number'] = $_POST['id_number'];
            $data['Registration']['email'] = $_POST['email'];
            $data['Registration']['occupation'] = $_POST['occupation'];
            $data['Registration']['organization'] = $_POST['organization'];
            $data['Registration']['regdate'] = date('Y-m-d H:i:s');
            $data['Registration']['qrcode'] = md5(sha1($salt . $data['Registration']['email']));
            if ($this->Registration->save($data)) {
                $Email = new CakeEmail();
                $Email->from(array('noreply@tesolchile.cl' => 'Tesol Registration Department'));
                $Email->to($data['Registration']['email']);
                $Email->subject('Successfully Registered');
                $Email->send('You can get your QR Code at: http://admin.tesolchile.cl/registrations/qrcode/' . $data['Registration']['qrcode']);
                $response = array('status' => 'success', 'msg' => 'Registration successfully created', 'data' => $data);
            }
        }
        echo json_encode($response);
    }

    public function delete($id = null)
    {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('get');

        $this->Registration->id = $id;
        if (!$this->Registration->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Registration->delete()) {
            $this->Flash->success(__('Registration deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Registration was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

    public function show()
    {
        $this->layout = 'ajax';
        $this->render(false);
        $active_conference = $this->Conference->findAllByActive('1');
        $active_conference = $active_conference[0]['Conference'];
        $setups = $this->Setup->find('all', array('conditions' => array('Setup.conferences_id' => $active_conference['id'])));
        if (isset($setups[0]['Setup']['item']) && $setups[0]['Setup']['item'] == 'show_registration_form') {
            echo json_encode(array('show' => $setups[0]['Setup']['value']));
        } else {
            echo json_encode(array('show' => 'false', 'setups' => $setups));
        }
    }

    public function qrcode($generated_code = '')
    {
        $this->layout = 'login';
        if ($generated_code == '') {
            $this->redirect('http://www.tesol.cl');
        }
        $registration = $this->Registration->findByQrcode($generated_code);
        if (!isset($registration['Registration']['id'])) {
            $this->redirect('http://www.tesol.cl');
        }
        $destination = utf8_encode('http://admin.tesolchile.cl/registrations/attendance/' . $generated_code);
        $this->set('destination', $destination);
        $this->set('registration', $registration);
    }

    public function attendance($generated_code = '') {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Registration']['users_id'] = $this->Auth->user('id');
            $this->request->data['Registration']['attendance_count']++;
            $this->request->data['Registration']['attendance_date'] = date('Y-m-d H:i:s');
            if ($this->Registration->save($this->request->data)) {
                $this->Flash->success(__('Registration saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The registration could not be saved. Please, try again.')
            );
        } else {
            $exists = 0;
            $registration = $this->Registration->findByQrcode($generated_code);
            if (isset($registration['Registration']['id'])) {
                $exists = 1;
            }
            $this->request->data = $registration;
            $this->set('exists', $exists);
            $this->set('registration', $registration);
        }
    }

    public function attend($registration_id)
    {
        if ($this->request->is('post') || $this->request->is('put')) {
            $this->request->data['Registration']['users_id'] = $this->Auth->user('id');
            $this->request->data['Registration']['attendance_count']++;
            $this->request->data['Registration']['attendance_date'] = date('Y-m-d H:i:s');
            if ($this->Registration->save($this->request->data)) {
                $this->Flash->success(__('Registration saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The registration could not be saved. Please, try again.')
            );
        } else {
            $registration = $this->Registration->findById($registration_id);
            $this->request->data = $registration;
            $this->set('registration', $registration);
        }
    }

    public function edit($registration_id)
    {
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->Registration->save($this->request->data)) {
                $this->Flash->success(__('Registration saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The registration could not be saved. Please, try again.')
            );
        } else {
            $registration = $this->Registration->findById($registration_id);
            $this->request->data = $registration;
            $this->set('registration', $registration);
        }
    }

    public function register() {
        if ($this->request->is('post') || $this->request->is('put')) {
            $salt = 'tesol90125';
            $this->request->data['Registration']['regdate'] = date('Y-m-d H:i:s');
            $this->request->data['Registration']['users_id'] = $this->Auth->user('id');
            if ($this->request->data['Registration']['regdate'] > 0)
            $this->request->data['Registration']['attendance_count'] = 1;
            $this->request->data['Registration']['attendance_date'] = date('Y-m-d H:i:s');
            
            if ($this->Registration->save($this->request->data)) {
                $this->Flash->success(__('Registration saved'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('The registration could not be saved. Please, try again.')
            );
        }
    }

}