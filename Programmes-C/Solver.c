#include <stdlib.h>
#include <stdio.h>


int taille = 6;

/*
Copie les valeurs d'un tableau dans un autre
*/
void cpy(int tab[taille][taille],int  clon[taille][taille]){
    
    for(int i =0; i<taille ; ++i){
        for(int j=0; j<taille; ++j){
            clon[i][j]=tab[i][j];
        }
    }
}
/*
Affiche le tableau à deux entrée
*/
void affiche(int tab[taille][taille]){
    for(int i =0; i<taille ; ++i){
        for(int j=0; j<taille; ++j){
            printf("%d",tab[i][j]);
        }
        printf("\n");
    }
}
void  sovle(int tab[taille][taille], int posx, int posy){
    
}
int main(){
    int tab[6][6]={
        {0,0,0,0,0,0},
        {0,0,0,0,0,0},
        {0,0,0,0,0,0},
        {0,0,0,0,0,0},
        {0,0,0,0,0,0},
        {0,0,0,0,0,0},
        
    };
    int klone[6][6];
    cpy(tab,klone);
    affiche(klone);
}

