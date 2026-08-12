<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
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
        if ($this->request->is('post')) {

            $email = $this->request->getData('email');
            $password = $this->request->getData('password');

            $user = $this->Users->find()
                ->where([
                    'email' => $email
                ])
                ->first();

            if (
                $user &&
                (new \Cake\Auth\DefaultPasswordHasher())
                    ->check($password, $user->password)
            ) {

                $this->request->getSession()->write(
                    'Auth.User',
                    $user
                );

                return $this->redirect([
                    'controller' => 'Products',
                    'action' => 'index'
                ]);
            }

            $this->Flash->error(
                'Invalid email or password.'
            );
        }
    }

    public function logout()
    {
        $this->request->getSession()->delete('Auth.User');

        return $this->redirect([
            'action' => 'login'
        ]);
    }
}
