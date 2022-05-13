#include <stdlib.h>
#include <stdio.h>
#include <stdbool.h>

/*
Solver en backtraking
*/

int taille = 6;
/*
Copie les valeurs d'un tableau dans un autre
*/
void copie(int tab1[taille][taille], int tab2[taille][taille], int taille)
{
    int i;
    for (i = 0; i < taille; i++)
    {
        int j;
        for (j = 0; j < taille; j++)
        {
            tab2[i][j] = tab1[i][j];
        }
    }
}
/*
Affiche le tableau à deux entrée
*/
void affiche(int tab[taille][taille]){
    for(int i =0; i<taille ; ++i){
        for(int j=0; j<taille; ++j){
            printf("%3d",tab[i][j]);
        }
        printf("\n");
    }
}
/*
Verifie si la ligne est conordante
*/
bool ligneValide(int tab[taille][taille],int i){
		bool coloneIncomplete = false; 	// Variable indiquant si la ligne est completement remplis, ou non
		int nb_de_1 = 0;					// Nombre de 1 de la ligne
		int nb_de_0 = 0;					// Nombre de 0 de la ligne
		
		if(tab[i][0] == 0) 
			nb_de_0 ++;
		else if(tab[i][0] == 1) 
			nb_de_1 ++;
		else 
			coloneIncomplete = true; 	// On definit coloneIncomplete a vrai
		
		if(tab[i][1] == 0) 
			nb_de_0 ++;
		else if(tab[i][1] == 1) 
			nb_de_1 ++;
		else 
			coloneIncomplete = true; 	// On definit coloneIncomplete a vrai
		
		// Pour chaque colone
		for (int j = 2; j < taille; j++) {
			// Si trois cases consecutives sont identique (non vide)
 			if(tab[i][j-2] == tab[i][j-1] && tab[i][j-1] == tab[i][j] && tab[i][j] != -1) return false; // Le Takuzu est invalide
 			
 			if(tab[i][j] == 0)  nb_de_0 ++;
 			else if(tab[i][j] == 1) nb_de_1 ++;
 			else 
 				coloneIncomplete = true; 	// On definit coloneIncomplete a vrai
		}
		
		return (nb_de_1 == (taille / 2) && nb_de_0 == (taille / 2)) || (coloneIncomplete && nb_de_0 <= (taille / 2) && nb_de_1 <= (taille / 2));
	}
/*Verifie si la colone est conordante
*/
bool coloneValide(int tab[taille][taille],int j){
        bool ligneIncomplete = false; 	// Variable indiquant si la ligne est completement remplis, ou non
        int nb_de_1 = 0;					// Nombre de 1 de la ligne
        int nb_de_0 = 0;					// Nombre de 0 de la ligne

        if(tab[0][j] == 0)
            nb_de_0 ++;
        else if(tab[0][j] == 1)
            nb_de_1 ++;
        else
            ligneIncomplete = true; 	// On definit ligneIncomplete a vrai

        if(tab[1][j] == 0)
            nb_de_0 ++;
        else if(tab[1][j] == 1)
            nb_de_1 ++;
        else
            ligneIncomplete = true; 	// On definit ligneIncomplete a vrai
            
        // Pour chaque ligne
        for (int i = 2; i < taille; i++) {
            // Si trois cases consecutives sont identique (non vide)
            if(tab[i-2][j] == tab[i-1][j] && tab[i-1][j] == tab[i][j] && tab[i][j] != -1) return false; // Le Takuzu est invalide

            if(tab[i][j] == 0)
                nb_de_0 ++;
            else if(tab[i][j] == 1)
                nb_de_1 ++;
            else
                ligneIncomplete = true; 	// On definit ligneIncomplete a vrai
        }
        return (nb_de_1 == (taille / 2) && nb_de_0 == (taille / 2)) || (ligneIncomplete && nb_de_0 <= (taille / 2) && nb_de_1 <= (taille / 2));
    }

/*
Verifie si la ligne est unique
*/
bool verifligneunique(int tab[taille][taille],int ligne){
    for(int i=0; i<taille; ++i){
        if(i!=ligne){
            if(tab[ligne]==tab[i]){
                return false;
            }
        }
    }
    return true;
}
/*
Verifie si la colone est unique
*/
bool verifcolonneunique(int tab[taille][taille],int colone){
    for(int i=0; i<taille; ++i){
        if(i!=colone){
            if(tab[colone]==tab[i]){
                return false;
            }
        }
    }
    return true;
}
/*
Verifie si la grille est valide
*/
bool verif(int tab[taille][taille]){
    for(int i=0; i<taille; ++i){
        if(!ligneValide(tab,i)){
            return false;
        }
        if(!ligneValide(tab,i)){
            return false;
        }
        if(!verifligneunique(tab,i)){
            return false;
        }
        if(!verifcolonneunique(tab,i)){
            return false;
        }
    }
    return true;
}
/*
Verifie si on peut placer un 0 ou un 1
*/
bool verif_data(int tab[taille][taille], int n, int ligne, int colone){
    if(ligne==0){ //si on est sur la ligne 0
        if(tab[ligne+1][colone]!=n && tab[ligne+2][colone]!=n){
            return false;
        }
    }else if(ligne==taille-1){ //si on est sur la ligne 6
        if(tab[ligne-1][colone]!=n && tab[ligne-2][colone]!=n){
            return false;
        }
    }else{ //sinon
        if(tab[ligne-1][colone]!=n && tab[ligne+1][colone]!=n){
            return false;
        }
    }
    if(colone==0){ //si on est sur la colone 0
        if(tab[ligne][colone+1]!=n && tab[ligne][colone+2]!=n){
            return false;
        }
    }else if(colone==taille-1){ //si on est sur la colone 6
        if(tab[ligne][colone-1]!=n && tab[ligne][colone-2]!=n){
            return false;
        }
    }else{ //sinon
        if(tab[ligne][colone-1]!=n && tab[ligne][colone+1]!=n){
            return false;
        }
    }
    int nbnc = 0;
    int nbnl = 0;
    for(int i=0; i<taille; ++i){
        if(tab[ligne][i]==n){
            nbnc++;
        }
        if(tab[i][colone]==n){
            nbnl++;
        }
    }
    return true;
}


/*
solveur Tazuku en backtraking
*/
bool solveur(int tab[taille][taille], int ligne, int colone){
    int clone[taille][taille];
    copie(tab,clone,taille);
    for (int i = 0; i < 2; i++) {
			if(tab[ligne][colone] == -1){ 											// Si la case original contient -1 (case vide)
				clone[ligne][colone] ++;												// On l'incremente dans notre copie local	
			}
			if(colone < taille){										// Si l'on ne se trouve pas en fin de ligne, on passe a la colone suivante
				if(ligneValide(clone,ligne) && coloneValide(clone,colone)){
					bool tmp = solveur(clone, ligne, colone +1);					// On passe a la resolution de la case suivante
					if(tmp  && verif(clone)) return tmp;
				}
			} else if(ligne < taille -1){										// Sinon, si l'on se trouve en fin de ligne
				if(ligneValide(clone,ligne) && coloneValide(clone,colone) && verifligneunique(clone,ligne)){
					bool tmp = solveur(clone, ligne + 1, 0);						// On passe a la resolution de la ligne suivante
					if(tmp && verif(clone)) return tmp;
				}
			}else {
				if(verif(clone)){tab=clone; return true;}
				return false;
			}
		}
		
		return false;
	}



    







int main(){
    
    int tab[6][6]={
        {-1,1,-1,-1,-1,0},
        {-1,1,0,-1,-1,-1},
        {1,-1,-1,-1,1,-1},
        {-1,0,-1,-1,1,-1},
        {-1,-1,-1,0,-1,-1},
        {-1,1,1,-1,-1,1},
        
    };
    int clone[taille][taille];
    copie(tab,clone, taille);
    bool a=solveur(tab,0,0);
    printf("%d",verif(tab));
    printf("\n");
    printf("%d",a);
    printf("\n");
    affiche(tab);
}

