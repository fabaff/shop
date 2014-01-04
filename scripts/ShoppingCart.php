<?php
	class ShoppingCart {
		private $items = array();
		
		public function addItem($art, $qty) {
			if (!isset($this->items[$art])) {
				$this->items[$art] = 0;
			}
			$this->items[$art] += $qty;
		}
		
		public function changeItemQty($art, $qty) {
			if (isset($this->items[$art])) {
				$this->items[$art] = $qty;
				if ($this->items[$art] <= 0) {
					unset($this->items[$art]);
				}
				return true;
			} else {
                return false;
            }
		}
		
		public function changeItemOne($art, $qty) {
			if (isset($this->items[$art])) {
				$this->items[$art] += $qty;
				if ($this->items[$art] <= 0) {
					unset($this->items[$art]);
				}
				return true;
			} else {
                return false;
            }
		}
		
		public function removeItemAll($art) {
			if (isset($this->items[$art])) {
				unset($this->items[$art]);
				return true;
			} else {
                return false;
            }
		}

		public function removeAll() {
			if (isset($_SESSION["cart"])) {
				unset($_SESSION["cart"]);
				return true;
			} else {
                return false;
            }
		}

		public function getPrice($art) {
            // TODO: Find out why the import doesn't work
            //require_once('../config/dbconnect.php');
            $connection = new mysqli('localhost', 'root', 'webshop', 'webshop');

            if ($connection->connect_errno == 0) {  
				// Create SQL query
				$sql = "SELECT * FROM products WHERE id = '$art'";
                $results = $connection->query($sql);
                $result = $results->fetch_object();
				$price = $result->price;
			}
			return $price;
		}

		public function getProduct($art) {
            // TODO: Find out why the import doesn't work
            //require_once('../config/dbconnect.php');
            $connection = new mysqli('localhost', 'root', 'webshop', 'webshop');

            if ($connection->connect_errno == 0) {  
				// Create SQL query
				$sql = "SELECT * FROM products WHERE id = '$art'";
                $results = $connection->query($sql);
                $result = $results->fetch_object();
				$name = $result->pname;
			}
			return $name;
		}

		public function display() {
            $total = 0;
            echo "<table class=\"table table-striped\">"."\n";
            echo "<thead valign=\"bottom\">"."\n";
			echo "<tr>"."\n";
            echo "<th class=\"head\">Article</th>"."\n";
            echo "<th class=\"head\">Quantity</th>"."\n";
            echo "<th class=\"head\">Price</th>"."\n";
            echo "<th class=\"head\">Subtotal</th>"."\n";
            echo "<th class=\"head\">Options</th>"."\n";
            echo "</tr>"."\n";
            echo "</thead>"."\n";
            echo "<tbody valign=\"top\">"."\n";
			foreach ($this->items as $art=>$qty) {
                $name = $this->getProduct($art);
                $price = $this->getPrice($art);
                $subtotal = $price * $qty;
				echo "<tr>
						<td>$name</td>
						<td>
                    <div class=\"form-group\">
							<form name=\"qtyForm\" action=\"cart.php\" method=\"GET\">
								<input type=\"hidden\" name=\"artChangeQty\" value=\"$art\" />
								<input class=\"form-control\"  style=\"width:50px;\" name=\"artQty\" value=\"$qty\" />
								<input class=\"btn btn-default btn-xs\" name=\"plus\" type=\"submit\" value=\"plus\" />
								<input class=\"btn btn-default btn-xs\" name=\"minus\" type=\"submit\" value=\"minus\" />
								<input class=\"btn btn-default btn-xs\" name=\"update\" type=\"submit\" value=\"Update\" />
							</form>
                    </div>
						</td>
                        <td>$price</td>
                        <td>$subtotal</td>
						<td>
							<form name='removeForm' action='cart.php' method='get'>
								<input type='hidden' name='artRemoveAll' value='$art'/>
								<input class=\"btn btn-default btn-sm\" type='submit' value='Remove' />
							</form>
						</td>
					  </tr>"."\n";

            }
            echo "</tbody>"."\n";
			echo "</table>"."\n";
		}
		
		public function displayCart() {
			$total = 0;
            echo "<table class=\"table table-striped\">"."\n";
            echo "<thead valign=\"bottom\">"."\n";
			echo "<tr>"."\n";
            echo "<th class=\"head\">Article</th>"."\n";
            echo "<th class=\"head\">Price</th>"."\n";
            echo "<th class=\"head\">Quantity</th>"."\n";
            echo "<th class=\"head\">Subtotal</th>"."\n";
            echo "</tr>"."\n";
            echo "</thead>"."\n";
            echo "<tbody valign=\"top\">"."\n";
			foreach ($this->items as $art=>$qty) {
                $name = $this->getProduct($art);
                $price = $this->getPrice($art);
				$subtotal = $price * $qty;
				$total = $total + $subtotal;
				echo "<tr>"."\n";
				echo "<td>$name</td>"."\n";
				echo "<td>$price</td>"."\n";
				echo "<td>$qty</td>"."\n";
				echo "<td>$subtotal</td>"."\n";
				echo "</tr>"."\n";
			}
			echo "<tr class=\"success\">"."\n";
			echo "<td colspan=\"2\">&nbsp;</td>"."\n";
			echo "<td><strong>Total Price:</strong></td>"."\n";
			echo "<td><strong>".$total."</strong></td>"."\n";
			echo "</tr>";
            echo "</tbody>"."\n";
			echo "</table>"."\n";
		}
		
		public function getArray() {
			$array = array();
			foreach ($this->items as $art=>$qty) {
				$array[$art] = $qty;
			}
			return $array;
		}
	}
?>
