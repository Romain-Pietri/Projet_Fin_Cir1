/*
Structure grille, contient la taille de l'espace de jeu et le tableau buffer de la grille

*/
typedef struct Grille {
    int taille;
    int tab[8][8];
}Grille;
typedef struct Node {
    Grille* g;
    struct Node* next;
}Node;

typedef struct List {
    Node* head;
    Node* tail;
    int size;
}List;






List* Newlist();
Node* NewLinkedListItem(Grille* value);
int AddList(List* list, Node* elem);
List* resetList(List* list);
Grille* Newgrille();
void initGrille(Grille* grid, int taille, int tab[8][8]);
Grille* cloneGrille(Grille* g);
void printGrille(Grille* g);
int countElemCol(Grille* g, int col, int val);
int countElemLigne(Grille* g, int ligne, int val);
bool isUniqueCol(Grille* g, int col);
bool isUniqueLigne(Grille* g, int ligne);
bool checkElem(Grille* g, int ligne, int col, int val);
bool VerifGrille(Grille* g);
Grille* Solve(Grille* g, int ligne, int col);
bool Solveur(Grille* g);
bool inteligent(Grille* g);
Grille* Resoudre(Grille* g);
Grille* Solvenb(Grille* g, int ligne, int col, List* liste);
int nbsolution(Grille* g, List* liste);


