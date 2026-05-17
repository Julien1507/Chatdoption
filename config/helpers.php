<?php
function emailValide($email) {
    return preg_match("/^[a-zA-Z0-9._%+-]{2,}@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email);
}

function mdpValide($mdp) {
    return strlen($mdp) > 6 && preg_match("/[A-Z]/", $mdp) && preg_match("/[0-9]/", $mdp);
}

function nomValide($nom) {
    return preg_match("/^[a-zA-ZÀ-ÖØ-öø-ÿ]{2,}$/", $nom);
}

function prenomValide($prenom) {
    return preg_match("/^[a-zA-ZÀ-ÖØ-öø-ÿ]{2,}$/", $prenom);
}