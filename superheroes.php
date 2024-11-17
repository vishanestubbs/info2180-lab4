<?php

header("Access-Control-Allow-Origin: *");  // Allow all origins
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");  // Allow these HTTP methods
header("Access-Control-Allow-Headers: Content-Type");  // Allow specific headers (if needed)
$superheroes = [
  [
      "id" => 1,
      "name" => "Steve Rogers",
      "alias" => "Captain America",
      "biography" => "Recipient of the Super-Soldier serum, World War II hero Steve Rogers fights for American ideals as one of the world’s mightiest heroes and the leader of the Avengers.",
  ],
  [
      "id" => 2,
      "name" => "Tony Stark",
      "alias" => "Ironman",
      "biography" => "Genius. Billionaire. Playboy. Philanthropist. Tony Stark's confidence is only matched by his high-flying abilities as the hero called Iron Man.",
  ],
  [
      "id" => 3,
      "name" => "Peter Parker",
      "alias" => "Spiderman",
      "biography" => "Bitten by a radioactive spider, Peter Parker’s arachnid abilities give him amazing powers he uses to help others, while his personal life continues to offer plenty of obstacles.",
  ],
  [
      "id" => 4,
      "name" => "Carol Danvers",
      "alias" => "Captain Marvel",
      "biography" => "Carol Danvers becomes one of the universe's most powerful heroes when Earth is caught in the middle of a galactic war between two alien races.",
  ],
  [
      "id" => 5,
      "name" => "Natasha Romanov",
      "alias" => "Black Widow",
      "biography" => "Despite super spy Natasha Romanoff’s checkered past, she’s become one of S.H.I.E.L.D.’s most deadly assassins and a frequent member of the Avengers.",
  ],
  [
      "id" => 6,
      "name" => "Bruce Banner",
      "alias" => "Hulk",
      "biography" => "Dr. Bruce Banner lives a life caught between the soft-spoken scientist he’s always been and the uncontrollable green monster powered by his rage.",
  ],
  [
      "id" => 7,
      "name" => "Clint Barton",
      "alias" => "Hawkeye",
      "biography" => "A master marksman and longtime friend of Black Widow, Clint Barton serves as the Avengers’ amazing archer.",
  ],
  [
      "id" => 8,
      "name" => "T'challa",
      "alias" => "Black Panther",
      "biography" => "T’Challa is the king of the secretive and highly advanced African nation of Wakanda - as well as the powerful warrior known as the Black Panther.",
  ],
  [
      "id" => 9,
      "name" => "Thor Odinson",
      "alias" => "Thor",
      "biography" => "The son of Odin uses his mighty abilities as the God of Thunder to protect his home Asgard and planet Earth alike.",
  ],
  [
      "id" => 10,
      "name" => "Wanda Maximoff",
      "alias" => "Scarlett Witch",
      "biography" => "Notably powerful, Wanda Maximoff has fought both against and with the Avengers, attempting to hone her abilities and do what she believes is right to help the world.",
  ], 
];

?>

<?php function noCriteria(){
    ?>
<ul>
<?php foreach ($GLOBALS['superheroes'] as $superhero): ?>
  <li><?= $superhero['alias']; ?></li>
<?php endforeach; 
 ?>
</ul> 
<?php
}
?>

 
<?php 
function findinfo($info){

// Sanitize input to prevent XSS
$info = htmlspecialchars($info, ENT_QUOTES, 'UTF-8');

// Validate input (e.g., allowing only letters and spaces for superhero names)
    if (!preg_match("/^[a-zA-Z ]*$/", $info)) {
        echo "Invalid input";
        exit; // Stop further processing if input is invalid
}
    $flag= false;
    if ($info==""){
        $flag=true;
        noCriteria();

    } else{
        foreach($GLOBALS['superheroes'] as $superhero){
            if ($info==$superhero['name'] or $info==$superhero['alias']){ ?>
                <h3><?= strtoupper($superhero['alias']);?> </h3>
                <h4><?='A.K.A '.strtoupper( $superhero['name']);?> </h4>
                <p><?= $superhero['biography'];?></p>
                <?php
                $flag=true;
                break;
            }
        
    }
    }
    if (!$flag) { ?>
        <strong>SUPERHERO NOT FOUND</strong> <?php
    }
    
} 

$search= $_GET['search'];
findinfo($search);

