# language: fr
Fonctionnalité: ma super classe Message
  Afin de gérer des messages simples en majuscule
  En tant que utilisateur
  Je dois être capable d'effectuer des opérations basiques avec ma classe

Scénario: Avoir un message valide
    Etant donné que j'ai un nouveau message "bonjour tout le monde"
    Alors je dois voir s'afficher "BONJOUR TOUT LE MONDE"

Scénario: Avoir un autre message valide
    Etant donné que j'ai un nouveau premier message "bonjour"
    Et que j'ai un autre message "le monde"
    Alors je dois voir s'afficher "BONJOUR LE MONDE"

Scénario: Avoir un message non valide
    Etant donné que j'ai un nouveau message "17"
    Alors je dois avoir une exception "TypeError"