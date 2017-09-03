<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 */
class UsersController extends AppController {

    /**
     * 一覧画面
     */
    public function index(){
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    /**
     * 閲覧画面
     *
     * @param null $id
     */
    public function view($id = null){
        $this->User->id = $id;
        if(!$this->User-exists()){
            throw new NotFoundException(__('適切ではないユーザアクセスです。'));
        }
        $this->set('user', $this->User->findById($id));
    }

    /**
     * 登録画面
     *
     * @return \Cake\Network\Response|null
     */
    public function add(){
        if($this->request->is('post')){
            $this->User->create();
            if($this->User->save($this->request->data)){
                $this->Flash->success(__('ユーザ情報が保存されました。'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('ユーザ情報が保存されませんでした。再度登録してください。'));
        }
    }

    /**
     * 編集画面
     *
     * @param null $id
     * @return \Cake\Network\Response|null
     */
    public function edit($id = null){
        $this->User->id = $id;
        if(!$this->User->exists()){
            throw new NotFoundException(__('適切ではないユーザアクセスです。'));
        }
        if($this->request->is('post') || $this->request->is('put')){
            if($this->User->save($this->request->data)){
                $this->Flash->success(__('ユーザ情報が保存されました。'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('ユーザ情報が保存されませんでした。再度登録してください。'));
        }else{
            $this->request->data = $this->User->findById($id);
        }
    }

    /**
     * ユーザ削除
     *
     * @param null $id
     * @return \Cake\Network\Response|null
     */
    public function delete($id = null){
        $this->User->id = $id;
        if(!$this->User->exists()){
            throw new NotFoundException(__('適切ではないユーザアクセスです。'));
        }
        if($this->User->delete()){
            $this->Flash->success(__('ユーザ情報を削除しました。'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('ユーザ情報が削除できませんでした。'));
        return $this->redirect(array('action' => 'index'));
    }



}
