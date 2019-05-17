<?php
/**
 * Created by PhpStorm.
 * User: andres
 * Date: 2018-04-09
 * Time: 16:03
 */

App::uses('AppController', 'Controller');



class SetupsController extends AppController
{
    var $uses = array('Conference', 'Setup');

    public function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('get_friends');
    }

    public function index() {
        $active_conference = $this->Conference->findAllByActive('1');
        $active_conference = $active_conference[0]['Conference'];
        $setups = $this->Setup->find('all', array('conditions' => array('conferences_id' => $active_conference['id'])));
        $this->set('setups', $setups);
        $friends_list = $this->Setup->find('all', array('conditions' => array('item LIKE' => 'friends_%', 'conferences_id' => $active_conference['id'])));
        foreach ($friends_list as $friend) {
            $friends[] = $friend['Setup'];
        }
        $this->set('friends', $friends);
    }

    public function edit() {
        $this->layout = 'ajax';
        $this->render(false);
        $result = 'error';
        if (isset($_POST['id']) && isset($_POST['value'])) {
            $this->Setup->id = $_POST['id'];
            $this->Setup->set(array('value' => $_POST['value']));
            $result = $this->Setup->save();
        }
        echo json_encode(array('result' => $result, 'post' => $_POST));
    }

    public function get_friends()
    {
        $this->layout = 'ajax';
        $this->render(false);
        $active_conference = $this->Conference->findAllByActive('1');
        $active_conference = $active_conference[0]['Conference'];
        $setups = $this->Setup->find('all', array('conditions' => array('item LIKE' => 'friends_%', 'conferences_id' => $active_conference['id'])));
        foreach ($setups as $friend) {
            $friends[] = $friend['Setup'];
        }
        echo json_encode(array('friends' => $friends));
    }

    public function add_friend()
    {
        $this->layout = 'ajax';
        $this->render(false);
        $target_file = "/img/" . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        if (isset($_POST["submit"])) {
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if ($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }
    }
}