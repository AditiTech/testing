<?php 
class CRUD extends Database {

		public function insert($table,$data){
				if(!empty($data) && is_array($data)){
					$columns = '';
					$values  = '';
					$i = 0;
					
					$columnString = implode(',', array_keys($data));
					$valueString = ":".implode(',:', array_keys($data));
					$sql = "INSERT INTO ".$table." (".$columnString.") VALUES (".$valueString.")";
					$query = $this->query($sql);
					foreach($data as $key=>$val){
						$this->bind(':'.$key, $val);
					}
					$insert = $this->execute();
					return $insert?$this->lastInsert():false;
				}else{
					return false;
				}
			}
			
			public function update($table,$data,$conditions){
				if(!empty($data) && is_array($data)){
					$colvalSet = '';
					$whereSql = '';
					$i = 0;
					
					foreach($data as $key=>$val){
						$pre = ($i > 0)?', ':'';
						$colvalSet .= $pre.$key."='".$val."'";
						$i++;
					}
					if(!empty($conditions)&& is_array($conditions)){
						$whereSql .= ' WHERE ';
						$i = 0;
						foreach($conditions as $key => $value){
							$pre = ($i > 0)?' AND ':'';
							$whereSql .= $pre.$key." = '".$value."'";
							$i++;
						}
					}
					$sql = "UPDATE ".$table." SET ".$colvalSet.$whereSql;
					$query = $this->query($sql);
					$update = $this->execute();
					return $update?$this->rowCount():false;
				}else{
					return false;
				}
			}
			
			public function delete($table,$conditions){
				
				$whereSql = '';
				if(!empty($conditions)&& is_array($conditions)){
					$whereSql .= ' WHERE ';
					$i = 0;
					foreach($conditions as $key => $value){
						$pre = ($i > 0)?' AND ':'';
						$whereSql .= $pre.$key." = '".$value."'";
						$i++;
					}
				}
				$sql = "DELETE FROM ".$table.$whereSql;
				$this->query($sql);
				$delete = $this->execute();
				return $delete?$delete:false;
			}

			public function getRows($table,$conditions = array()){
				$sql = 'SELECT ';
				$sql .= array_key_exists("select",$conditions)?$conditions['select']:'*';
				$sql .= ' FROM '.$table;

				//joins
				if(array_key_exists("join",$conditions)){
					foreach ($conditions['join'] as $key => $value) {
						$sql .= ' INNER JOIN '.$key;
						$sql .= ' ON '.$value;		
					}
				}
				
				if(array_key_exists("where",$conditions)){
					$sql .= ' WHERE ';
					$i = 0;
					foreach($conditions['where'] as $key => $value){
						$pre = ($i > 0)?' AND ':'';
						$sql .= $pre.$key." = '".$value."'";
						$i++;
					}
				}
				
				if(array_key_exists("order_by",$conditions)){
					$sql .= ' ORDER BY '.$conditions['order_by']; 
				}
				
				if(array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
					$sql .= ' LIMIT '.$conditions['start'].','.$conditions['limit']; 
				}elseif(!array_key_exists("start",$conditions) && array_key_exists("limit",$conditions)){
					$sql .= ' LIMIT '.$conditions['limit']; 
				}
				
				$query = $this->query($sql);
				$this->execute();
				
				if(array_key_exists("return_type",$conditions) && $conditions['return_type'] != 'all'){
					switch($conditions['return_type']){
						case 'count':
							$data = $this->rowCount();
							break;
						case 'single':
							$data = $this->single(PDO::FETCH_ASSOC);
							break;
						default:
							$data = '';
					}
				}else{
					if($this->rowCount() > 0){
						$data = $this->resultSet();
					}
				}
				return !empty($data)?$data:false;
			}

			//Image compress
			function compress_image($source_url, $destination_url, $quality) 
			{

			    $info = getimagesize($source_url);

			        if ($info['mime'] == 'image/jpeg')
			              $image = imagecreatefromjpeg($source_url);

			        elseif ($info['mime'] == 'image/gif')
			              $image = imagecreatefromgif($source_url);

			      elseif ($info['mime'] == 'image/png')
			              $image = imagecreatefrompng($source_url);

			        imagejpeg($image, $destination_url, $quality);
			    return $destination_url;
			}

			//Create Thumb Image
			function create_thumb_image($target_folder ='',$thumb_folder = '', $thumb_width = '',$thumb_height = '',$file_ext='')
			 {  
			     //folder path setup
			         $target_path = $target_folder;
			         $thumb_path = $thumb_folder;  
			          

			         $thumbnail = $thumb_path;
			         $upload_image = $target_path;

			            list($width,$height) = getimagesize($upload_image);
			            $thumb_create = imagecreatetruecolor($thumb_width,$thumb_height);
			            switch($file_ext){
			                case 'jpg':
			                    $source = imagecreatefromjpeg($upload_image);
			                    break;
			                case 'jpeg':
			                    $source = imagecreatefromjpeg($upload_image);
			                    break;
			                case 'png':
			                    $source = imagecreatefrompng($upload_image);
			                    break;
			                case 'gif':
			                    $source = imagecreatefromgif($upload_image);
			                     break;
			                default:
			                    $source = imagecreatefromjpeg($upload_image);
			            }
			       imagecopyresized($thumb_create, $source, 0, 0, 0, 0, $thumb_width, $thumb_height, $width,$height);
			            switch($file_ext){
			                case 'jpg' || 'jpeg':
			                    imagejpeg($thumb_create,$thumbnail,80);
			                    break;
			                case 'png':
			                    imagepng($thumb_create,$thumbnail,80);
			                    break;
			                case 'gif':
			                    imagegif($thumb_create,$thumbnail,80);
			                     break;
			                default:
			                    imagejpeg($thumb_create,$thumbnail,80);
			            }
			 }
	}
?>