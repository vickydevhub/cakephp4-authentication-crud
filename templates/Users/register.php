<h1>Register</h1>

<?= $this->Form->create($user) ?>

<?= $this->Form->control('name', [
    'label' => 'Name'
]) ?>

<?= $this->Form->control('email', [
    'label' => 'Email'
]) ?>

<?= $this->Form->control('password', [
    'label' => 'Password'
]) ?>

<?= $this->Form->button('Register') ?>

<?= $this->Form->end() ?>

<br>

<?= $this->Html->link(
    'Already have an account? Login',
    ['action' => 'login']
) ?>