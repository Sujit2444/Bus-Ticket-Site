<?php
   
   class QueryBuilder{

   private $pdo;
   public function __construct($connectionObj){
    
    $this->pdo=$connectionObj;
   }

   public function selectAll($table,$toClass){
    
     $statement=$this->pdo->prepare("select * from {$table}");
     // var_dump($statement);
     $statement->execute();
     
     return $statement->fetchAll(PDO::FETCH_CLASS,"App\\model\\$toClass");

   }

   public function insert($table,$parameters){
    
     $sql=sprintf('insert into %s (%s) values (%s)',
      $table,
      implode(',', array_keys($parameters)),
      ':'.implode(',:', array_keys($parameters))
     );
       
         //dd($parameters);
         //dd($sql);
         try{
           $statement= $this->pdo->prepare($sql);
           $statement->execute($parameters);
          }catch(Exception $e){
               
              die("whooops!problem occured... :( ");                     
           }     
   }


   public function selectAllByOneDetail($table,$toClass,$postValues){
     
     $arrKey=array_keys($postValues);
     $sql=sprintf('select * from  %s  WHERE %s=%s ',
      $table,
       $arrKey[0],
       ':'.$arrKey[0]
     );

     //dd($sql);
     $statement= $this->pdo->prepare($sql);

     $statement->execute($postValues);
     
     return $statement->fetchAll(PDO::FETCH_CLASS,"App\\model\\$toClass");

   }

   public function selectAllByTwoDetail($table,$toClass,$postValues){     

     $arrKey=array_keys($postValues);

     $sql=sprintf('select * from  %s  WHERE %s=%s  AND %s=%s ',
      $table,
       $arrKey[0],
       ':'.$arrKey[0],
        $arrKey[1],
       ':'.$arrKey[1]
     );

     //dd($sql);
     $statement= $this->pdo->prepare($sql);

     $statement->execute($postValues);
     
     return $statement->fetchAll(PDO::FETCH_CLASS,"App\\model\\$toClass");

   }

     
     public function selectAllByFourDetail($table,$toClass,$postValues){
     

     $arrKey=array_keys($postValues);
     $sql=sprintf('select * from  %s  WHERE %s=%s AND %s=%s AND %s=%s AND %s=%s',
      $table,
       $arrKey[0],
       ':'.$arrKey[0],
        $arrKey[1],
       ':'.$arrKey[1],
        $arrKey[2],
       ':'.$arrKey[2],
       $arrKey[3],
       ':'.$arrKey[3]
     );

    // dd($sql);
     $statement= $this->pdo->prepare($sql);

     $statement->execute($postValues);
     
     return $statement->fetchAll(PDO::FETCH_CLASS,"App\\model\\$toClass");

   }


    

    public function selectAllById($table,$toClass,$id){
     $statement=$this->pdo->prepare("select * from {$table} WHERE id = ?");
     //dd($statement);
     $statement->execute([$id]);
     
     return $statement->fetchAll(PDO::FETCH_CLASS,"App\\model\\$toClass");

   }

   
   public function updateOneDetail($table,$postValues){
     
     $arrKey=array_keys($postValues);
    
     $sql=sprintf("UPDATE %s SET %s=%s WHERE %s=%s ",
        $table,
       $arrKey[0],
       ':'.$arrKey[0],
       $arrKey[1],
       ':'. $arrKey[1]    
     );

     //dd($sql);
     $statement= $this->pdo->prepare($sql);

     $statement->execute($postValues);
     

   }
    
    public function updateTwoDetail($table,$postValues){
     
     $arrKey=array_keys($postValues);
    
     $sql=sprintf("UPDATE %s SET %s=%s , %s=%s WHERE %s=%s ",
        $table,
       $arrKey[0],
       ':'.$arrKey[0],
       $arrKey[1],
       ':'. $arrKey[1] ,
       $arrKey[2],
       ':'. $arrKey[2]     
     );

     //dd($sql);
     $statement= $this->pdo->prepare($sql);

     $statement->execute($postValues);
     

   }

     public function updateThreeDetail($table,$postValues){
     
     $arrKey=array_keys($postValues);
    
     $sql=sprintf("UPDATE %s SET %s=%s , %s=%s , %s=%s WHERE %s=%s ",
        $table,
       $arrKey[0],
       ':'.$arrKey[0],
       $arrKey[1],
       ':'. $arrKey[1] ,
       $arrKey[2],
       ':'. $arrKey[2], 
       $arrKey[2],
       ':'. $arrKey[2]    
     );

     //dd($sql);
     $statement= $this->pdo->prepare($sql);

     $statement->execute($postValues);
     

   }

     public function updateFourDetail($table,$postValues){
     
     $arrKey=array_keys($postValues);
    
     $sql=sprintf("UPDATE %s SET %s=%s , %s=%s , %s=%s ,%s=%s WHERE %s=%s ",
        $table,
       $arrKey[0],
       ':'.$arrKey[0],
       $arrKey[1],
       ':'. $arrKey[1] ,
       $arrKey[2],
       ':'. $arrKey[2], 
       $arrKey[2],
       ':'. $arrKey[2],
       $arrKey[3],
       ':'. $arrKey[3]    
     );

     //dd($sql);
     $statement= $this->pdo->prepare($sql);

     $statement->execute($postValues);
     

   }

     public function updateFiveDetail($table,$postValues){
     
     $arrKey=array_keys($postValues);
    
     $sql=sprintf("UPDATE %s SET %s=%s , %s=%s , %s=%s , %s=%s , %s=%s WHERE %s=%s ",
        $table,
       $arrKey[0],
       ':'.$arrKey[0],
       $arrKey[1],
       ':'. $arrKey[1] ,
       $arrKey[2],
       ':'. $arrKey[2], 
       $arrKey[2],
       ':'. $arrKey[2],
       $arrKey[3],
       ':'. $arrKey[3],
       $arrKey[4],
       ':'. $arrKey[4]    
     );

     //dd($sql);
     $statement= $this->pdo->prepare($sql);

     $statement->execute($postValues);
     

   }

   /*public function updateById($table,$values,$id){
     $statement= $this->pdo->prepare("UPDATE $table SET lastName = ? , email = ?  WHERE id = ?");

     $statement->execute([$values[0],$values[1],$id]);
   }*/

   public function deteteById($table,$id){
     $statement = $this->pdo->prepare("DELETE FROM $table WHERE id = ?");
     $statement->execute([$id]);
   }




}