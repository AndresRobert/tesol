<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2018-04-09
 * Time: 16:03
 */

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class LandingsController extends AppController
{

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('add');
    }

    public function index() {
        $landings = $this->Landing->find('all');
        $this->set('landings', $landings);
    }

    public function export() {
        $this->response->download("export.csv");
        $data = $this->Landing->find('all');
        $this->set(compact('data'));
        $this->layout = 'ajax';
        return;
    }

    public function view($id = null)
    {
        $this->Landing->id = $id;
        if (!$this->Landing->exists()) {
            throw new NotFoundException(__('Invalid landing'));
        }
        $this->set('user', $this->Landing->findById($id));
    }

    public function add()
    {
        $this->layout = 'ajax';
        $this->render(false);
        $response = array('status' => 'failed', 'data' => $_POST);
        if ($this->request->is('post')) {
            $data['Landing'] = $_POST;
            if (!empty($data['Landing'])) {
                $data['Landing']['regdate'] = date('Y-m-d H:i:s');
                if ($this->Landing->save($data)) {
                    $Email = new CakeEmail();
                    $Email->from(array('noreply@tesolchile.cl' => 'Tesol Landing System'));
                    $Email->to('tesolchile@gmail.com');
                    $Email->subject('New Landing Received');
                    $Email->send('
                        Name: ' . $data['Landing']['name'] . '
                        Email: ' . $data['Landing']['email'] . '
                        Phone: ' . $data['Landing']['phone'] . '
                        Message: ' . $data['Landing']['message']);
                    $response = array('status' => 'success', 'msg' => 'Landing successfully created', 'data' => $data);
                }
            }
        }
        echo json_encode($response);
    }

    public function contact($id = null) {
        
        $this->Landing->id = $id;
        if (!$this->Landing->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->Landing->set(array('contacted' => 1));
        if ($this->Landing->save()) {
            $this->Flash->success(__('Contacted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Not Contacted'));
        return $this->redirect(array('action' => 'index'));
    }

    public function delete($id = null)
    {
        // Prior to 2.5 use
        // $this->request->onlyAllow('post');

        $this->request->allowMethod('post');

        $this->Landing->id = $id;
        if (!$this->Landing->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->Landing->delete()) {
            $this->Flash->success(__('Landing deleted'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('Landing was not deleted'));
        return $this->redirect(array('action' => 'index'));
    }

}