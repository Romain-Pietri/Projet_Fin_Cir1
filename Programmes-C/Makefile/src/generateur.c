#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <string.h>
#include <time.h>
#include "generateur.h"
#include <time.h>

void randomFill(Grille *g,int taille){
    srand(time(NULL));
    g->taille=taille;
    int posx,posy,val;
    int tour;
    int upper;
    int lower;
    switch (taille) {
        case 4:
            upper=6;
            lower=5;
            break;
        case 6:
            upper=11;
            lower=8;
            break;
        case 8:
            upper=16;
            lower=14;
            break;

    }

    tour=(rand()%(upper - lower + 1)) + lower;
    for(int i=0;i<tour;++i){
        do{
            posx=rand()%g->taille;
            posy=rand()%g->taille;
            val=rand()%2;
        }while(g->tab[posx][posy]!=-1 || !checkElem(g,posx,posy,val));
        g->tab[posx][posy]=val;
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
Grille * GenerateGrid(int taille){
    Grille* tmp=Newgrille();
    do{
        resetGrid(tmp);
        randomFill(tmp,taille);
        
    }while(!Solveur(cloneGrille(tmp)));
    return tmp;
}

/*
int main() {
    
    Grille * g=GenerateGrid(6);
    printGrille(g);
}*/