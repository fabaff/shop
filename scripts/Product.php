<?php
    class Product {
	    protected $id;
	    protected $name;
	    protected $desc;
	    protected $type;
	    protected $price;
	
        /**
         * Constructor for the products
         */
	    public function __construct($id, $name, $desc, $type, $price)	{
		    $this->id = $id;
		    $this->name = $name;
		    $this->desc = $desc;
		    $this->type = $type;
		    $this->price = $price;
	    }
        /**
         * Returns the product id.
         *
         * @return string The product id
         */
	    public function getId()	{
		    return $this->id;
	    }

        /**
         * Returns the product name.
         *
         * @return string The product name
         */
	    public function getName() {
		    return $this->name;
	    }
        /**
         * Returns the product name.
         *
         * @return string The product description
         */
	    public function getDescription() {
		    return $this->desc;
	    }
        /**
         * Returns the product type.
         *
         * @return string The product type
         */
	    public function getType() {
		    return $this->type;
	    }
        /**
         * Returns the product price.
         *
         * @return string The product price
         */
	    public function getPrice() {
		    return $this->price;
	    }
    }
?>
