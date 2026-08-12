<?php
declare(strict_types=1);

use Migrations\AbstractMigration;

class CreateProducts extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     * @return void
     */
    public function change(): void
    {
        $table = $this->table('products');
        $table
            ->addColumn('name', 'string', [
                'limit' => 150,
                'null' => false,
            ])
            ->addColumn('description', 'text', [
                'null' => true,
            ])
            ->addColumn('price', 'decimal', [
                'precision' => 10,
                'scale' => 2,
                'null' => false,
            ])
            ->addColumn('quantity', 'integer', [
                'default' => 0,
                'null' => false,
            ])
            ->addColumn('created', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->addColumn('modified', 'datetime', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
                'null' => false,
            ])
            ->create();
    }
}
