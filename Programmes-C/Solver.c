#include <stdbool.h>
#include <stdlib.h>
#include <stdio.h>
#include "Solver.h"


/*
Alloue de la mémoire dynamiquement pour la grille
*/
Grille * Newgrille(){
    
    Grille *tmp;
    tmp =(Grille*)malloc(sizeof(Grille));
    if (tmp != NULL) {
        tmp->taille = 0;
        for(int i=0;i<8;i++){
            for(int j=0;j<8;j++){
                tmp->tab[i][j] = -1;
            }
        }
    }
    return tmp;
}
/*
initalise la grille
*/
void initGrille(Grille *grid, int taille, int tab[8][8]){
    grid->taille=taille;
    for(int i=0;i<8;i++){
        for(int j=0;j<8;j++){
            grid->tab[i][j] = tab[i][j];
        }
    }
}
/*
Creer un clone de la grille
*/
Grille * cloneGrille(Grille * g){
    Grille *tmp;
    tmp =(Grille*)malloc(sizeof(Grille));
    if (tmp != NULL) {
        tmp->taille = g->taille;
        for(int i=0;i<8;i++){
            for(int j=0;j<8;j++){
                tmp->tab[i][j] = g->tab[i][j];
            }
        }

    }
    return tmp;
}
/*
Affiche la grille fournie en paramètre
*/
void printGrille(Grille * g){
    for(int i=0;i<g->taille;i++){
        for(int j=0;j<g->taille;j++){
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
    for(int i=0;i<g->taille;i++){
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
    for(int i=0;i<g->taille;i++){
        if(g->tab[ligne][i]==val){
            count++;
        }
    }
    return count;
}
/*
Verifie si la colone est unique
*/
bool isUniqueCol(Grille *g,int col){
    bool unique=true;
    for(int i=0;i<g->taille;i++){
        unique=true;
        if(i!=col){
            for(int j=0;j<g->taille;j++){
                if(g->tab[i][j]!=g->tab[col][j]){
                    unique=false;
                }
                
            }
            if(unique) return false;
        }
    }
    return true;
}
/*
Verifie si la ligne est unique
*/
bool isUniqueLigne(Grille *g,int ligne){
    bool unique=true;
    for(int i=0;i<g->taille;i++){
        unique=true;
        if(i!=ligne){
            for(int j=0;j<g->taille;j++){
                if(g->tab[j][i]!=g->tab[j][ligne]){
                    unique=false;
                }
                
            }
            if(unique) return false;
        }
    }
    return true;
}
/*
Vérifie si on peut placer la valeurs a cet endroit
*/
bool checkElem(Grille *g,int ligne,int col,int val){
    if(countElemCol(g,col,val)==g->taille/2 || countElemLigne(g,ligne,val)==g->taille/2 ){
        return false;
    }
    if(ligne==0){
        if(col==0){
            
            if((g->tab[ligne+1][col]==val && g->tab[ligne+2][col]==val ) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val)){
                
                return false;
            }
        }
        else if(col==g->taille-1){
            if((g->tab[ligne+1][col]==val && g->tab[ligne+2][col]==val ) || (g->tab[ligne][col-1]==val && g->tab[ligne][col-2]==val)){
                return false;
            }
        }
        else if(col==1){
            if((g->tab[ligne+1][col]==val && g->tab[ligne+2][col]==val ) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val)){
                return false;
            }
        }
        else if(col==g->taille-2){
            if((g->tab[ligne+1][col]==val && g->tab[ligne+2][col]==val ) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val) || (g->tab[ligne][col-2]==val && g->tab[ligne][col-1]==val)){
                return false;
            }
        }
        else{
            if((g->tab[ligne+1][col]==val && g->tab[ligne+2][col]==val ) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val) || (g->tab[ligne][col-2]==val && g->tab[ligne][col-1]==val) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val)){
                return false;
            }
        }
    }
    else if(ligne==g->taille-1){
        if(col==0){
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val)){
                return false;
            }
        }
        else if(col==g->taille-1){
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne][col-1]==val && g->tab[ligne][col-2]==val)){
                return false;
            }
        }
        else if(col==1){
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val)){
                return false;
            }
        }
        else if(col==g->taille-2){
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val) || (g->tab[ligne][col-2]==val && g->tab[ligne][col-1]==val)){
                return false;
            }
        }
        else{
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val) || (g->tab[ligne][col-2]==val && g->tab[ligne][col-1]==val) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val)){
                return false;
            }
        }
    }
    else if(ligne==1){
        if(col==0){
            if((g->tab[ligne+1][col]==val && g->tab[ligne+2][col]==val ) || (g->tab[ligne-1][col]==val && g->tab[ligne+1][col]==val) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val)){
                return false;
            }
        }
        else if(col==g->taille-1){
            if((g->tab[ligne+1][col]==val && g->tab[ligne+2][col]==val ) || (g->tab[ligne-1][col]==val && g->tab[ligne+1][col]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col-2]==val)){
                return false;
            }
        }
        else if(col==1){
            if((g->tab[ligne+1][col]==val && g->tab[ligne+2][col]==val ) || (g->tab[ligne-1][col]==val && g->tab[ligne+1][col]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val)){
                return false;
            }
        }
        else if(col==g->taille-2){
            if((g->tab[ligne+1][col]==val && g->tab[ligne+2][col]==val ) || (g->tab[ligne-1][col]==val && g->tab[ligne+1][col]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val) || (g->tab[ligne][col-2]==val && g->tab[ligne][col-1]==val)){
                return false;
            }
        }
        else{
            if((g->tab[ligne+1][col]==val && g->tab[ligne+2][col]==val ) || (g->tab[ligne-1][col]==val && g->tab[ligne+1][col]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val)){
                return false;
            }

        }

    }
    else if(ligne==g->taille-2){
        if(col==0){
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne+1][col]==val && g->tab[ligne-1][col]==val) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val)){
                return false;
            }
        }
        else if(col==g->taille-1){
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne+1][col]==val && g->tab[ligne-1][col]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col-2]==val)){
                return false;
            }
        }
        else if(col==1){
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne+1][col]==val && g->tab[ligne-1][col]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val)){
                return false;
            }
        }
        else if(col==g->taille-2){
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne+1][col]==val && g->tab[ligne-1][col]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val) || (g->tab[ligne][col-2]==val && g->tab[ligne][col-1]==val)){
                return false;
            }

        
        }
    }
    else{
        if(col==0){
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne+1][col]==val && g->tab[ligne-1][col]==val) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val)){
                return false;
            }
        }
        else if(col==g->taille-1){
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne+1][col]==val && g->tab[ligne-1][col]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col-2]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col-2]==val)){
                return false;
            }
        }
        else if(col==1){
            if((g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val ) || (g->tab[ligne+1][col]==val && g->tab[ligne-1][col]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col+1]==val) || (g->tab[ligne][col+1]==val && g->tab[ligne][col+2]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col-2]==val)){
                return false;
            }
        }
        else if(col==g->taille-2){
            if((g->tab[ligne-1][col]==val && g->tab[ligne+1][col]==val) || (g->tab[ligne-1][col]==val && g->tab[ligne-2][col]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col-2]==val) || (g->tab[ligne][col-1]==val && g->tab[ligne][col-2]==val)){
                return false;
            }
        }
    }
    return true;
}
/*
Verifie si la grille est concordante ou non
*/
bool VerifGrille(Grille *g){
    for(int i=0;i<g->taille;++i){
        if(countElemCol(g, i,0)!=countElemCol(g, i, 1) || countElemLigne(g, i,0)!=countElemLigne(g, i,1) || (countElemCol(g, i, 0)!=g->taille/2 && countElemLigne(g, i, 0)!=g->taille/2)){
            return false;
        }
        if(!isUniqueCol(g,i) || !isUniqueLigne(g, i)) return false;
        for(int j=1;j<g->taille-1;++j){
            if(i==0 || i==g->taille-1){
                if(g->tab[i][j-1]==g->tab[i][j] && g->tab[i][j+1]==g->tab[i][j]){
                    return false;
                }
            }
            else{
                if((g->tab[i-1][j]==g->tab[i][j] && g->tab[i+1][j]==g->tab[i][j] ) || (g->tab[i][j-1]==g->tab[i][j] && g->tab[i][j+1]==g->tab[i][j])){
                    return false;
                }
            }

        }
        
    }
    return true;
}
/*
Resout la grille avec Backtracking
*/
Grille *Solve(Grille *g, int ligne, int col){
    Grille *clone=cloneGrille(g);
    if(g->tab[ligne][col]!=-1){
        if (col<g->taille-1){
            return Solve(g, ligne, col+1);
        }
        else if (ligne<g->taille-1){
            return Solve(g, ligne+1, 0);
        }
        else{
            return g;
        }
    }

    for(int i=0 ; i<2;++i){
        if(g->tab[ligne][col]==-1) clone->tab[ligne][col]++;
        if(col<g->taille-1){
            if(checkElem(g,ligne, col, clone->tab[ligne][col])){
                
                Grille *tmp=Solve(cloneGrille(clone),ligne,col+1);
                if(tmp!=NULL && VerifGrille(tmp)){
                    return tmp;
                }
            }
        }
        else if(ligne<g->taille-1){
            if(checkElem(g,ligne, col, clone->tab[ligne][col])){
                Grille *tmp=Solve(cloneGrille(clone),ligne+1,0);
                if(tmp!=NULL && VerifGrille(tmp)){
                    return tmp;
                }
            }
        }
        else{
            if(VerifGrille(clone)) return clone;
            return NULL;
        }
    }
    return NULL;
}
/*
Remplie la grille avec les solutions facile à trouver
*/
bool inteligent(Grille *g){
    printf("\n");
    printGrille(g);
    printf("\n");
    for(int i=0; i<g->taille; ++i){
        if(countElemCol(g, i, 0)==g->taille/2 && countElemCol(g, i, 1)!=g->taille/2){
            for(int j=0; j<g->taille; ++j){
                if(g->tab[j][i]==-1){
                    g->tab[j][i]=1;
                }
            }
            return true;
        }
        if(countElemLigne(g, i, 0)==g->taille/2 && countElemLigne(g, i, 1)!=g->taille/2){
            for(int j=0; j<g->taille; ++j){
                if(g->tab[i][j]==-1){
                    g->tab[i][j]=1;
                }
            }
            return true;
        }
        if(countElemCol(g, i, 1)==g->taille/2 && countElemCol(g, i, 0)!=g->taille/2){
            for(int j=0; j<g->taille; ++j){
                if(g->tab[j][i]==-1){
                    g->tab[j][i]=0;
                }
            }
            return true;
        }
        if(countElemLigne(g, i, 1)==g->taille/2 && countElemLigne(g, i, 0)!=g->taille/2){
            for(int j=0; j<g->taille; ++j){
                if(g->tab[i][j]==-1){
                    g->tab[i][j]=0;
                }
            }
            return true;
        }
        for(int j=0; j<g->taille; ++j){
            if(g->tab[i][j]==-1){           
                if(i!=0 && i!=g->taille-1){
                    if(g->tab[i-1][j]==0 && g->tab[i+1][j]==0){
                        g->tab[i][j]=0;
                        return true;
                    }
                    else if(g->tab[i-1][j]==1 && g->tab[i+1][j]==1){
                        g->tab[i][j]=1;
                        return true;
                    }
                }
                if(j!=0 && j!=g->taille-1){
                    if(g->tab[i][j-1]==0 && g->tab[i][j+1]==0){
                        g->tab[i][j]=0;
                        return true;
                    }
                    else if(g->tab[i][j-1]==1 && g->tab[i][j+1]==1){
                        g->tab[i][j]=1;
                        return true;
                    }
                }
                if(i<=g->taille-3){
                    if(g->tab[i+1][j]==0 && g->tab[i+2][j]==0){
                        g->tab[i][j]=0;
                        if(i+3<g->taille){
                            if(g->tab[i+3][j]==-1){
                                g->tab[i+3][j]=0;
                            }
                        }
                        return true;
                    }
                    else if(g->tab[i+1][j]==1 && g->tab[i+2][j]==1){
                        g->tab[i][j]=1;
                        if(i+3<g->taille){
                            if(g->tab[i+3][j]==-1){
                                g->tab[i+3][j]=1;
                            }
                        }
                        return true;
                    }
                }
                if(j<=g->taille-3){
                    if(g->tab[i][j+1]==0 && g->tab[i][j+2]==0){
                        g->tab[i][j]=0;
                        if(j+3<g->taille){
                            if(g->tab[i][j+3]==-1){
                                g->tab[i][j+3]=0;
                            }
                        }
                        return true;
                    }
                    else if(g->tab[i][j+1]==1 && g->tab[i][j+2]==1){
                        g->tab[i][j]=1;
                        if(j+3<g->taille){
                            if(g->tab[i][j+3]==-1){
                                g->tab[i][j+3]=1;
                            }
                        }
                        return true;
                    }
                }
                if(i>=2){
                    if(g->tab[i-1][j]==0 && g->tab[i-2][j]==0){
                        g->tab[i][j]=0;
                        if(i-3>=0){
                            if(g->tab[i-3][j]==-1){
                                g->tab[i-3][j]=0;
                            }
                        }
                        return true;
                    }
                    else if(g->tab[i-1][j]==1 && g->tab[i-2][j]==1){
                        g->tab[i][j]=1;
                        if(i-3>=0){
                            if(g->tab[i-3][j]==-1){
                                g->tab[i-3][j]=1;
                            }
                        }
                        return true;
                    }
                }
                if(j>=2){
                    if(g->tab[i][j-1]==0 && g->tab[i][j-2]==0){
                        g->tab[i][j]=0;
                        if(j-3>=0){
                            if(g->tab[i][j-3]==-1){
                                g->tab[i][j-3]=0;
                            }
                        }
                        return true;
                    }
                    else if(g->tab[i][j-1]==1 && g->tab[i][j-2]==1){
                        g->tab[i][j]=1;
                        if(j-3>=0){
                            if(g->tab[i][j-3]==-1){
                                g->tab[i][j-3]=1;
                            }
                        }
                        return true;
                    }
                }
        }
        }
    }

    return false;
}
/*
Resout la grille avec Backtracking et l'intelligence
*/
bool Solveur(Grille *g){
    while(inteligent(g)){
        NULL;
    }
    printGrille(g);
    printf("\n");
    Grille *tmp=Solve(g,0,0);
    if(tmp!=NULL){
        printGrille(tmp);
        return true;
    }
    else{
        printf("Aucune solution\n");
        return false;
    }
}
int main(){
    Grille *g=Newgrille();
    int tab[8][8]={
        {-1,-1,-1,-1,-1,-1,-1,-1},
        {-1,-1,-1,-1,-1,-1,-1,-1},
        {-1,-1,-1,-1,-1,-1,-1,-1},
        {-1,-1,-1,-1,-1,-1,-1,-1},
        {-1,-1,-1,-1,-1,-1,-1,-1},
        {-1,-1,-1,-1,-1,-1,-1,-1},
        {-1,-1,-1,-1,-1,-1,-1,-1},
        {-1,-1,-1,-1,-1,-1,-1,-1}      
    };
    initGrille(g,4, tab);

    Solveur(g);
}