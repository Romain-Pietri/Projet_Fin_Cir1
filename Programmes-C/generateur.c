#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <string.h>
#include <time.h>

typedef struct Grille{
    int taille;
    int tab[16][16];
}Grille;

/*
Alloue de la mémoire dynamiquement pour la grille
*/
Grille * Newgrille(){
    
    Grille *tmp;
    tmp =(Grille*)malloc(sizeof(Grille));
    if (tmp != NULL) {
        tmp->taille = 0;
        for(int i=0;i<16;i++){
            for(int j=0;j<16;j++){
                tmp->tab[i][j] = -1;
            }
        }

    }
    return tmp;
}

int isRow3(Grille* grid,int numrow){
    if(numrow>grid->taille){
        return EXIT_FAILURE;
    }
    int ThreeInRow=0;
        for (int j=0;j<grid->taille;j++){
            if(j==0){
                if(grid->tab[numrow][j]==grid->tab[numrow][j+1] && grid->tab[numrow][j+1]==grid->tab[numrow][j+2]){
                    return 1;
                }
            }
            else if(j==grid->taille-1){
                if(grid->tab[numrow][j]==grid->tab[numrow][j-1] && grid->tab[numrow][j-1]==grid->tab[numrow][j-2]){
                    return 1;
                }
            }
            else{
                if(grid->tab[numrow][j]==grid->tab[numrow][j-1] && grid->tab[numrow][j-1]==grid->tab[numrow][j+1]){
                   return 1;
                }
            }
        }
    return 0;
}

int isCol3(Grille* grid,int numcol){
    if(numcol>grid->taille){
        return EXIT_FAILURE;
    }
    int ThreeInCol=0;
        for (int i=0;i<grid->taille;i++){
            if(i==0){
                if(grid->tab[i][numcol]==grid->tab[i+1][numcol] && grid->tab[i+1][numcol]==grid->tab[i+2][numcol]){
                    return 1;
                }
            }
            else if(i==grid->taille-1){
                if(grid->tab[i][numcol]==grid->tab[i-1][numcol] && grid->tab[i-1][numcol]==grid->tab[i-2][numcol]){
                    return 1;
                }
            }
            else{
                if(grid->tab[i][numcol]==grid->tab[i+1][numcol] && grid->tab[i+1][numcol]==grid->tab[i-1][numcol]){
                   return 1;
                }
            }
        }
    return 0;
}

int isSameRow(Grille* grid,int numrow) {
    int samerow=0;
    for (int i=0;i<grid->taille-1;i++){
            int samecount=0;
            for(int j=0;j<grid->taille-1;j++){
                if(grid->tab[numrow][j]==grid->tab[i][j]){
                    samecount=samecount+1;
                }
            }
            if (samecount==grid->taille && i!=numrow){
                return 1;
            }
    }
    return 0;
}

int isSameCol(Grille* grid,int numcol) {
    int samecol=0;
    for (int j=0;j<grid->taille-1;j++){
            int samecount=0;
            for(int i=0;i<grid->taille-1;i++){
                if(grid->tab[i][numcol]==grid->tab[i][j]){
                    samecount=samecount+1;
                }
            }
            if (samecount==grid->taille && j!=numcol){
                return 1;
            }
    }
    return 0;
}

/*
Affiche la grille fournie en paramètre
*/
void printGrille(Grille * g){
    for(int i=0;i<16;i++){
        for(int j=0;j<16;j++){
            printf("%3d ",g->tab[i][j]);
        }
        printf("\n");
    }
}
/*
Compte le nombre le nombre de valeur dans une colone
*/
int countElemCol(Grille *g,int col,int val){
    int count=0;
    for(int i=0;i<16;i++){
        if(g->tab[i][col]==val){
            count++;
        }
    }
    return count;
}
/*
Compte le nombre le nombre de valeur dans une ligne
*/
int countElemLigne(Grille *g,int ligne,int val){
    int count=0;
    for(int i=0;i<16;i++){
        if(g->tab[ligne][i]==val){
            count++;
        }
    }
    return count;
}

Grille* randomFill(Grille* grid, int taille){
    grid->taille=taille;
    for (int i=0;i<grid->taille;i++){
        for (int j=0;j<grid->taille;j++){
            grid->tab[i][j]=rand()%2;
        }
    }
    return grid;
}



int main() {
    Grille* tmp=Newgrille();
    Grille* grid=randomFill(tmp,4);
    printGrille(grid);
    
    return EXIT_SUCCESS;
}