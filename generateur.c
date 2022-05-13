#include <stdio.h>
#include <stdlib.h>
#include <random.h>


int createGrid(int taille) {
    int tab[taille][taille] = { 0 };
    for (int i = 0; i < taille; i++) {
        for (int j = 0; j < taille; j++) {
            tab[i][j] = rand(0, 2);
        }
    }
    return(tab);
}

bool isRow3(int tab,int taille) {
    for (int i = 1; i < taille-1; i++) {
        for (int j = 1; i < taille-1; i++) {
            if (tab[i][j] == tab[i - 1][j - 1]) {
                if (tab[i][j] == tab[i + 1][j + 1]) {
                    return true;
                }
            }
        }
    }
    return false;
}

bool isCol3(int tab, int taille) {
    for (int 1 = 0; i < taille - 1; i++) {
        for (int j = 1; i < taille - 1; i++) {
            if (tab[j][i] == tab[j - 1][i - 1]) {
                if (tab[j][i] == tab[j + 1][i + 1]) {
                    return true;
                }
            }
        }
    }
    return false;
}

bool isSameRow(int tab, int taille) {
    for (int i=0;i<taille-1;i++){
        int k=1;
        while(i+k<4){
            int samecount=0;
            for(int j=0;j<taille-1;j++){
                if(tab[i][j]==tab[i+k][j]){
                    samecount=samecount+1;
                }
            }
            k=k+1;
            if (samecount==4){
                return true;
            }
        }
    }
}

bool isSameCol(int tab, int taille) {
    for (int i=0;i<taille-1;i++){
        int k=1;
        while(j+k<4){
            int samecount=0;
            for(int j=0;j<taille-1;j++){
                if(tab[j][i]==tab[j+k][i]){
                    samecount=samecount+1;
                }
            }
            k=k+1;
            if (samecount==4){
                return true;
            }
        }
    }
    return false;
}



int main() {
    createGrid(4, 4);
}