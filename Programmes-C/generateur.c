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

bool isRow3(Grille *grid) {
    for (int i = 1; i < grid->taille-1; i++) {
        for (int j = 1; i < grid->taille-1; i++) {
            if (grid->tab[i][j] == grid->tab[i - 1][j - 1]) {
                if (grid->tab[i][j] == grid->tab[i + 1][j + 1]) {
                    return true;
                }
            }
        }
    }
    return false;
}

bool isCol3(Grille* grid) {
    for (int i = 0; i < grid->taille - 1; i++) {
        for (int j = 1; i < grid->taille - 1; i++) {
            if (grid->tab[j][i] == grid->tab[j - 1][i - 1]) {
                if (grid->tab[j][i] == grid->tab[j + 1][i + 1]) {
                    return true;
                }
            }
        }
    }
    return false;
}

bool isSameRow(Grille* grid) {
    for (int i=0;i<grid->taille-1;i++){
        int k=1;
        while(i+k<grid->taille){
            int samecount=0;
            for(int j=0;j<grid->taille-1;j++){
                if(grid->tab[i][j]==grid->tab[i+k][j]){
                    samecount=samecount+1;
                }
            }
            k=k+1;
            if (samecount==grid->taille){
                return true;
            }
        }
    }
    return false;
}

bool isSameCol(Grille* grid) {
    for (int i=0;i<grid->taille-1;i++){
        int k=1;
        while(i+k<grid->taille){
            int samecount=0;
            for(int j=0;j<grid->taille-1;j++){
                if(grid->tab[j][i]==grid->tab[j+k][i]){
                    samecount=samecount+1;
                }
            }
            k=k+1;
            if (samecount==grid->taille){
                return true;
            }
        }
    }
    return false;
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