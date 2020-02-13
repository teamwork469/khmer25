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

      $this->crud->enableDetailsRow();
      $this->crud->getHeading('create');
 
      
      
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
      'label' => "created_at", // Table column heading
      'type' => 'Text'
    ]);
    $this->crud->addColumn([
      'name' => 'updated_at', // The db column name
      'label' => "updated_at", // Table column heading
      'type' => 'Text'
    ]);
  }

  public function setupCreateOperation()
  {

    $fields1 = [
        [
          'tab'=>'Gallery',
          'name' => 'gallery_name', // The db column name
          'label' => "Image", // Table column heading
          'type' => 'Text',

          'attributes' => [
            'placeholder' => 'Enter Name',
            'autocomplete'=>'off',
            'required'=>'true',
          ],
          'wrapperAttributes' => [
            'class' => 'form-group col-md-12'
          ],
        ],
        [
          'tab'=>'Gallery',
          'name' => 'created_at', // The db column name
          'label' => "created_at", // Table column heading
          'type' => 'date'
        ],
        [
          'tab'=>'Gallery',
          'name' => 'updated_at', // The db column name
          'label' => "updated_at", // Table column heading
          'type' => 'date'
        ],

    ];

    $fields2=[

          [  // Select
            'label' => "Name",
            'type' => 'select2',
            'tab'=>'Gallery Detail',
            'name' => 'gallery_id', // the db column for the foreign key
            'entity' => 'gallery', // the method that defines the relationship in your Model
            'attribute' => 'gallery_name', // foreign key attribute that is shown to user
            'model' => "App\Models\Gallery",
         
            // optional
            'options'   => (function ($query) {
                 return $query->orderBy('gallery_id', 'ASC')->get();
             }), // force the related options to be a custom query, instead of all(); you can use this to filter the results show in the select
            ],
            [
              'tab'=>'Gallery Detail',
              'label' => "Upload Image",
              'name' => "image",
              'type' => 'image',
              'upload' => true,
              'crop' => true, // set to true to allow cropping, false to disable
              'aspect_ratio' => 1, // ommit or set to 0 to allow any aspect ratio
              // 'disk' => 's3_bucket', // in case you need to show images from a different disk
              // 'prefix' => 'uploads/images/profile_pictures/' // in case your db value is only the file name (no path), you can use this to prepend your path to the image src (in HTML), before it's shown to the user;
            ],
            [
              'tab'=>'Gallery',
              'name' => 'created_at', // The db column name
              'label' => "created_at", // Table column heading
              'type' => 'date',
    
              'attributes' => [
                'placeholder' => 'Enter Name',
                'autocomplete'=>'off',
                'required'=>'true',
              ],
              'wrapperAttributes' => [
                'class' => 'form-group col-md-12'
              ],
            ]
  ];

    $this->crud->addFields($fields1);
  }

  public function setupUpdateOperation()
  {
      $this->setupCreateOperation();
  }
}