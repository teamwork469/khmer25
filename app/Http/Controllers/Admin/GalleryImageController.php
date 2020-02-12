<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


class GalleryImageController extends CrudController {

  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CloneOperation;

  public function setup() 
  {
      $this->crud->setModel("App\Models\Gallery");
      $this->crud->setRoute("admin/gallery");
      $this->crud->setEntityNameStrings('gallery', 'gallery');

      $this->crud->enableExportButtons();
      //$this->crud->setActionsColumnPriority(10000);
      //$this->crud->enableBulkActions();
  }

  public function setupListOperation()
  {
    $this->crud->addColumn([
      'name' => 'gallery_name', // The db column name
      'label' => "Image", // Table column heading
      'type' => 'Text'
    ]);
    $this->crud->addColumn([
      'name' => 'created_at', // The db column name
      'label' => "Image", // Table column heading
      'type' => 'Text'
    ]);
    $this->crud->addColumn([
      'name' => 'updated_at', // The db column name
      'label' => "Image", // Table column heading
      'type' => 'Text'
    ]);

  
  }

  public function setupCreateOperation()
  {
      //$this->crud->setValidation(TagCrudRequest::class);

    //   $this->crud->addField([
    //     'name' => 'category_name',
    //     'type' => 'text',
    //     'label' => "Category",
    //   ]);

      
 
  }

  public function setupUpdateOperation()
  {
      $this->setupCreateOperation();
  }
}