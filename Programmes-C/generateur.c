#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <string.h>
#include <time.h>
#include "Solver.h"
#include <time.h>



/* Remplit la grille avec des 0 et des 1 aléatoirement*/
Grille* randomFill(Grille* grid, int taille){
    srand(time(NULL));
    int val;
    grid->taille=taille;
    for (int i=0;i<grid->taille;i++){
        for (int j=0;j<grid->taille;j++){
            val=rand()%2;
            if(checkElem(grid,i,j,val)){
                grid->tab[i][j]=val;
            }
            else if(checkElem(grid,i,j,(val+1)%2)){
                grid->tab[i][j]=(val+1)%2;
            }
            else{
                j--;
            }

            }
        }
    return grid;
}

int main() {
    
    Grille* tmp=Newgrille();
    do{
    Grille* grid=randomFill(tmp,4);
    }while(!VerifGrille(tmp));
    printGrille(tmp);
    return EXIT_SUCCESS;
}