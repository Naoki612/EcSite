// <?php


// class Cart extends Model {
// 	public function run() {
// 		if (isset($_SESSION['items'])){
// 			$items = $_SESSION['items'];
// 		} else {
// 			$items = array();
// 		}
// 		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
// 			if (isset($_POST)){
// 				$item = $_POST;
// 			}
// 			array_push($items, $item);
// 		}
// 		if (isset($_GET['key'])) {
// 			$key = $_GET['key'];
// 			unset($items[$key]);
// 			array_merge($items);
// 		}
// 		$_SESSION['items'] = $items;
// 		return $items;
// 	}

// 	function getItemInfo($item) {
// 		try{
// 			$sql = "SELECT itemName, itemValue, itemCate, itemNo, itemInfo FROM itemNoTable where itemNo = :itemNo";
// 			$stmh = $this->db->prepare($sql);
// 			$stmh->bindParam(':itemNo', $item, \PDO::PARAM_INT);
// 			$stmh->execute();
// 			$row = $stmh->fetch(\PDO::FETCH_ASSOC);
// 		} catch (RuntimeException $e) {
// 			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
// 			$msgs[] = ['red', $e->getMessage()];
// 		}
// 		return $row;
// 	}

// 	function getFirstImage($itemNo,$colorNo) {
// 		$sql = "SELECT `ItemIMGName` FROM `imageTable` WHERE `itemNo` = " . $itemNo . ' AND colorNo = ' . $colorNo;
// 		try{
// 			$stmh = $this->db->prepare($sql);
// 			$stmh->execute();
// 			$row = $stmh->fetch(\PDO::FETCH_ASSOC);
// 		} catch (RuntimeException $e) {
// 			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
// 			$msgs[] = ['red', $e->getMessage()];
// 		}
// 		echo $row['ItemIMGName'];
// 	}
// 	function sizeView($itemSize) {
// 		$size = substr($itemSize, 0, 2);
// 		$size = $size . '.' . substr($itemSize, -1);
// 		echo $size;
// 	}

// 	function getColor($colorNo) {
// 		try{
// 			$sql = "SELECT `colorName` FROM colorTable WHERE colorNo = :colorNo";
// 			$stmh = $this->db->prepare($sql);
// 			$stmh->bindParam(':colorNo', $colorNo, \PDO::PARAM_INT);
// 			$stmh->execute();
// 			$row = $stmh->fetch(\PDO::FETCH_ASSOC);
// 		} catch (RuntimeException $e) {
// 			http_response_code($e instanceof PDOException ? 500 : $e->getCode());
// 			$msgs[] = ['red', $e->getMessage()];
// 		}
// 		echo $row['colorName'];
// 	}
// }