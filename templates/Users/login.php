<h1>Login</h1>

<?= $this->Form->create() ?>

<?= $this->Form->control('email', [
    'label' => 'Email'
]) ?>

<?= $this->Form->control('password', [
    'label' => 'Password'
]) ?>

<?= $this->Form->button('Login') ?>

<?= $this->Form->end() ?>

<p>
    <?= $this->Html->link(
        'Create an account',
        ['action' => 'register']
    ) ?>
</p>