<?php

$pdo = new PDO("mysql:host=127.0.0.1;dbname=banque", "root", "", [
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);


function executerReq($pdo,$query, $data = []){
  $stmt = $pdo->prepare($query);
  $stmt->execute($data);
  
  return $stmt;
  }

function listCompte($pdo,$numCompte){
  $req = executerReq($pdo,"SELECT numeroCompte FROM comptebancaire WHERE compteId != :compteId",["compteId" => $numCompte]);
  
  while($res = $req->fetch()){
    extract($res);
    $tab[] = $res;

  }
  return $tab;

}  

  function virement($pdo,$numCompte,$somme,$compteDestinataire){

    $req = executerReq($pdo,"SELECT solde FROM comptebancaire WHERE compteId = :compteId",["compteId" => $numCompte]);
    $solde = $req->fetch();
    if(intval($solde["solde"])<0){
      echo "Impossible d'effectuer le retrait car fonds insuffisants";
    }else {
      $total =intval($solde["solde"]) - intval($somme);

    $query = "UPDATE comptebancaire SET solde = :solde WHERE compteId = :compteId";
    
    $res1 = executerReq($pdo,$query, ["compteId" => $numCompte,"solde" => $total]);
    
    $req1 = executerReq($pdo,"SELECT solde FROM comptebancaire WHERE numeroCompte = :compteId",["compteId" => $compteDestinataire]);
    $solde1 = $req1->fetch();
    $total1 =intval($solde1["solde"]) + intval($somme);


    
    $query1 = "UPDATE comptebancaire SET solde = :solde WHERE numeroCompte = :compteId";
    
    $res2 = executerReq($pdo,$query1, ["compteId" => $compteDestinataire,"solde" => $total1]);
 
    if( $res1 && $res2 ){
    return true;
    }
    return null;
    }
    
    }  

    function retrait($pdo,$numCompte,$somme){

      $req = executerReq($pdo,"SELECT solde FROM comptebancaire WHERE compteId = :compteId",["compteId" => $numCompte]);
      $solde = $req->fetch();
      if(intval($solde["solde"])<0){
        echo "Impossible d'effectuer le retrait car fonds insuffisants";
      }else {
        $total =intval($solde["solde"]) - intval($somme);
  
      $query = "UPDATE comptebancaire SET solde = :solde WHERE compteId = :compteId";
      
      $res = executerReq($pdo,$query, ["compteId" => $numCompte,"solde" => $total]);
      
      if( $res ){
      return true;
      }
      return null;
      }
      
      }  

      function consulter($pdo, $clientId){
        $query = "SELECT * FROM comptebancaire WHERE clientId = :clientId";
        
        $res = executerReq($pdo,$query, ["clientId" => $clientId]);
       
        while($t = $res->fetch()){
          extract($t);
          $tab[] = $t;
        }
        return $tab;
        }
        function creationCompteBancaire($pdo,$numCompte,$solde,$typeCompte, $client){
          $query = "INSERT INTO comptebancaire VALUES (NULL,:num,:solde,:typeCompte,NOW(),:client)";
          
          $res = executerReq($pdo,$query, ["num" => $numCompte,"solde" => $solde,
          "typeCompte" => $typeCompte,"client" => $client]);
          if( $res ){
          return true;
          }
          return null;
          }
          function login($pdo,$email, $mdp){
            $query = "SELECT * FROM client WHERE email = :email AND mdp = :mdp";
            
            $res = executerReq($pdo,$query, ["email" => $email, "mdp" => $mdp]);
            $res = $res->fetch();
            if( $res ){
            return $res;
            }
              return null;
            }
            function depot($pdo,$numCompte,$somme){

              $req = executerReq($pdo,"SELECT solde FROM comptebancaire WHERE compteId = :compteId",["compteId" => $numCompte]);
              $solde = $req->fetch();
              
                $total =intval($solde["solde"]) + intval($somme);
          
              $query = "UPDATE comptebancaire SET solde = :solde WHERE compteId = :compteId";
              
              $res = executerReq($pdo,$query, ["compteId" => $numCompte,"solde" => $total]);
              
              if( $res ){
              return true;
              }
              return null;
              }
              function inscription($pdo,$nom,$prenom,$tel,$email, $mdp){
                $query = "INSERT INTO client VALUES (NULL,:nom,:prenom,:tel,:email,:mdp,NOW())";
                
                $res = executerReq($pdo,$query, ["nom" => $nom,"prenom" => $prenom,
                "tel" => $tel,"email" => $email, "mdp" => $mdp]);
                if( $res ){
                return true;
                }
                return null;
                }
                                    