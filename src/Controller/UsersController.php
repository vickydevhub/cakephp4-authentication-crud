<?php
declare(strict_types=1);

namespace App\Controller;
use Cake\Event\EventInterface;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent(
            'Authentication.Authentication'
        );
    }

    public function beforeFilter(EventInterface $event)
    {
        parent::beforeFilter($event);

        $this->Authentication->allowUnauthenticated([
            'login',
            'register',
        ]);
    }
    public function register()
    {
        $user = $this->Users->newEmptyEntity();

        if ($this->request->is('post')) {

            $user = $this->Users->patchEntity(
                $user,
                $this->request->getData()
            );

            if ($this->Users->save($user)) {

                $this->Flash->success(
                    'Registration successful.'
                );

                return $this->redirect([
                    'action' => 'login'
                ]);
            }

            $this->Flash->error(
                'Unable to register user.'
            );
        }

        $this->set(compact('user'));
    }

    public function login()
    {
        $result = $this->request
            ->getAttribute('authentication')
            ->getResult();

        if ($result->isValid()) {

            $redirect = $this->request
                ->getQuery('redirect', [
                    'controller' => 'Products',
                    'action' => 'index',
                ]);

            return $this->redirect($redirect);
        }

        if ($this->request->is('post')) {
            $this->Flash->error(
                'Invalid email or password.'
            );
        }
    }

    public function logout()
    {
        $this->Authentication->logout();

        return $this->redirect([
            'controller' => 'Users',
            'action' => 'login',
        ]);
    }
}
