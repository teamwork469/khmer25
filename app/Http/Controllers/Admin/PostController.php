<?php namespace App\Http\Controllers\Admin;

use Backpack\CRUD\app\Http\Controllers\CrudController;


class PostController extends CrudController {

  use \Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
  use \Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;

  public function setup() 
  {
      $this->crud->setModel("App\Models\Post");
      $this->crud->setRoute("admin/post");
      $this->crud->setEntityNameStrings('Post', 'Post');

      $this->crud->enableExportButtons();
      //$this->crud->setActionsColumnPriority(10000);
  }



  public function setupListOperation()
  {
    // $this->crud->addColumn([
    //   'name' => 'main_category_name', // The db column name
    //   'label' => "Main Category", // Table column heading
    //   'type' => 'Text'
    // ]);
   

  }

  public function setupCreateOperation()
  {
      //$this->crud->setValidation(TagCrudRequest::class);
      $fields1  = [
        [  // Select
          'tab'=>'Post',
          'label' => "Category",
          'type' => 'select2',
          'name' => 'category_id', // the db column for the foreign key
          'entity' => 'category', // the method that defines the relationship in your Model
          'attribute' => 'category_name', // foreign key attribute that is shown to user
          'model' => "App\Models\Category",
       
          // optional
          'options'   => (function ($query) {
               return $query->orderBy('category_name', 'ASC')->get();
           }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
          ],
          [
            'tab'=>'Post',
            'name' => 'title',
            'type' => 'textarea',
            'label' => "Title",

            'attributes'=>[
                'placeholder' => 'Title',
            ]
          ],
          [
            'tab'=>'Post',
            'label' => "Upload Image",
            'name' => "image",
            'filename' => "image_filename", // set to null if not needed
            'type' => 'base64_image',
            'aspect_ratio' => 1, // set to 0 to allow any aspect ratio
            'crop' => true, // set to true to allow cropping, false to disable
            'src' => NULL, // null to read straight from DB, otherwise set to model accessor function
          ],
          [
            'tab'=>'Post',
            'name' => 'created_at',
            'type' => 'date',
            'label' => "created_at",
          ],
          [
            'tab'=>'Post',
            'name' => 'updated_at',
            'type' => 'date',
            'label' => "updated_at",
          ],
      ];

      $fields2 = [
        [
          'tab'=>'Post Detail',
          'name' => 'sds',
          'type' => 'text',
          'label' => "Main Category"
        ]
      ];


     $custom =  [   // CustomHTML
        'name' => 'separator',
        'type' => 'custom_html',
        'value' => ''
      ];

      $this->crud->addField($custom);

      // $this->crud->addFields($fields1);
      // $this->crud->addFields($fields2);
 
  }
 

  public function setupUpdateOperation()
  {
      $this->setupCreateOperation();
  }
}