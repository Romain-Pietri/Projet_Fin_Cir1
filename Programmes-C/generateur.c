#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <string.h>
#include <time.h>
#include "Solver.h"
#include <time.h>

/* Remplit la grille avec des 0 et des 1 aléatoirement*/
void randomFill(Grille* grid, int taille){
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
}
/*
Reset la grilles avec des -1
*/
void resetGrid(Grille* grid){
    for (int i=0;i<grid->taille;i++){
        for (int j=0;j<grid->taille;j++){
            grid->tab[i][j]=-1;
        }
    }
}


int main() {
    srand(time(NULL));
    Grille* tmp=Newgrille();
    do{resetGrid(tmp);randomFill(tmp,4);}while(!VerifGrille(tmp));
    
    printf("%d",VerifGrille(tmp));
    printGrille(tmp);
}