<?php
// Örnek #1 Temel Enum Kullanımı
enum Suit {
    case Hearts;
    case Diamonds;
    case Clubs;
    case Spades;
}

function do_stuff(Suit $s) {
    // ...
}
do_stuff(Suit::Spades);
