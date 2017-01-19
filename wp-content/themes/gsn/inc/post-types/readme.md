# Create custom post type 

### Register New Post Type Code 

```
$event = new Custom_Post_Type();
$event->create('Event');
 
```

### Add post type support
```
$event->add_post_type_support($support_types);
```
 
> * $support_types :  
> (string|Array) (required) : for information visit https://codex.wordpress.org/Function_Reference/add_post_type_support

### Add taxonomy

```
$event->add_taxonomy( $name, $args = array(), $labels = array());

```

> * $name (string) (required) : Name of taxonomy

> * $args (array) (optional) : Argument  for taxonomy for information visit https://codex.wordpress.org/Function_Reference/register_taxonomy

> * $labels (array) (optional) : Lable for taxonomy  for information visit
https://codex.wordpress.org/Function_Reference/register_taxonomy

# Add Metabox to custom post type

```
 $event->add_meta_box($meta_box_name, $meta_fields);
 
```
> *  $meta_box_name(string)(required) : Name of Meta Box

> * $meta_fields (array) (optional): fields for metabox ( text|image| textarea|editor|checkbox|radio|dropdown|repeater|password)

### Text type 
```
 'Text label goes here' =>array(
		'name'=>$name,						//Name of text box. Name should be valid html name
		'id'=>$id,							//ID of text box. Name should be valid html id
		'class'=>$class, 					// Class for text field
		'type'=>"text",  					// type should be text 
		'placeholder'=>$placeholder, 		// placeholder text 
		'show_in_admin_table'=>true,		// Add column to listing table in admin. Value shouled be boolean. Default value false
		),
```

### Image type 
```
 'Image label goes here' =>array(
		'name'=>$name,						//Name of text box. Name should be valid html name
		'id'=>$id,							//ID of text box. Name should be valid html id
		'class'=>$class, 					// Class for text field
		'type'=>"image",  					// type should be image 
		'show_in_admin_table'=>true,		// Add column to listing table in admin. Value shouled be boolean. Default value false
		),
```

### Textarea Type

```
'Textarea label goes here' =>array(
		'name'=>$name,						//Name of text box. Name should be valid html name
		'id'=>$id,							//ID of text box. Name should be valid html id
		'class'=>$class,					// Class for text field
		'type'=>"textarea",					// type should be textarea
		'placeholder'=>$placeholder,		// placeholder text 
		'show_in_admin_table'=>true,		// Add column to listing table in admin. Value shouled be boolean. Default value false
```

### Editor type
```
'Editor label goes here' =>array(
		'name'=>$name,						//Name of text box. Name should be valid html name
		'id'=>$id,							//ID of text box. Name should be valid html id
		'class'=>$class,					// Class for text field
		'type'=>"editor",					// type should be editor
		'placeholder'=>$placeholder,		// placeholder text 
		'show_in_admin_table'=>true,		// Add column to listing table in admin. Value shouled be boolean. Default value false
		),

```

### Checkbox type

```
'Checkbox label goes here' =>array(
		'name'=>$name,						//Name of text box. Name should be valid html name
		'class'=>$class,					// Class for text field
		'type'=>"checkbox",					// type should be checkbox
		'options'=>array(					// options should be array
				'1'=>'One',					// options row  "key" => "value"
				'2'=>'Two',					// options row  "key" => "value"
				'3'=>'Three',				// options row  "key" => "value"
			)
		'show_in_admin_table'=>true,		// Add column to listing table in admin. Value shouled be boolean. Default value false
		),

```

### Radio type

```
'Radio label goes here' =>array(
		'name'=>$name,						//Name of text box. Name should be valid html name
		'class'=>$class,					// Class for text field
		'type'=>"radio",					// type should be radio
		'options'=>array(					// options should be array
				'1'=>'One',					// options row  "key" => "value"
				'2'=>'Two',					// options row  "key" => "value"
			)
		'show_in_admin_table'=>true,		// Add column to listing table in admin. Value shouled be boolean. Default value false
		),
		

```

### Dropdown | Select type

```
'Dropdown label goes here' =>array(
		'name'=>$name,						//Name of text box. Name should be valid html name
		'id'=>$id,							//ID of text box. Name should be valid html id
		'class'=>$class,					// Class for text field
		'type'=>"dropdown",					// type should be dropdown
		'options'=>array(					// options should be array
				'1'=>'One',					// options row  "key" => "value"
				'2'=>'Two',					// options row  "key" => "value"
			)
		''placeholder'=>$placeholder,		// placeholder text 
		'show_in_admin_table'=>true,		// Add column to listing table in admin. Value shouled be boolean. Default value false
		'multiple'=>true					// Boolean value , Default true
		),
```

### Repeater Type

```
'Repeater fields' =>array(
		'name'=>$name,						//Name of text box. Name should be valid html name
		'type'=>"repeater",					//type should be repeater
		'fieldset'=>array();				//Array of any valid  above field type ( text|image| textarea|editor|checkbox|radio|dropdown|password)				
		)

```

## Filters and hooks

Available filters
* admin_custom_{$post_type}_meta_field_table

```
echo add_filters( 'admin_custom_{$post_type}_meta_field_table', $function_to_add , 10,1 )

 // $post_type : valid registered post type slug
 // $function_to_add : function name 
 
 
```



