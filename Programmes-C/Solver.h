typedef struct Grille{
    int taille;
    int tab[16][16];
}Grille;

Grille * NewGrille();
void initGrille(Grille *grid, int taille, int tab[16][16]);
Grille * cloneGrille(Grille * g);
void printGrille(Grille * g, int taille);
int countElemCol(Grille *g,int col,int val);
int countElemLigne(Grille *g,int ligne,int val);
bool isUniqueCol(Grille *g,int col);
bool isUniqueLigne(Grille *g,int ligne);
bool checkElem(Grille *g,int ligne,int col,int val);
bool VerifGrille(Grille *g);
Grille *Solve(Grille *g, int ligne, int col);
