#include <stdio.h>
#include <stdlib.h>
#include <stdbool.h>
#include <string.h>
#include <time.h>
#include "Solver.h"
#include <time.h>
Grille* randomFill(Grille* g, int taille) {
    g->taille = taille;
    int val;
    int pos;
    for (int i = 0; i < taille; ++i) {
        val = rand() % 2;
        g->tab[i][i] = val;
    }
    //printGrille(g);
    return Resoudre(g);
}

void randomEmpty(Grille* g) {
    int tour;
    int posx, posy;
    int upperx, lowerx;
    int uppery, lowery;
    switch (g->taille) {
    case 4: tour = 2; break;
    case 6: tour = 5; break;
    case 8: tour = 10; break;
    }
    for (int i = 0; i < tour; ++i) {
        for (int j = 0; j <= 3; ++j) {
            switch (j) {
            case 0: lowerx = 0; lowery = 0; upperx = g->taille / 2 - 1; uppery = g->taille / 2 - 1; break;

            case 1: lowerx = g->taille / 2; lowery = 0; upperx = g->taille - 1; uppery = g->taille / 2 - 1; break;

            case 2: lowerx = 0; lowery = g->taille / 2; upperx = g->taille / 2 - 1; uppery = g->taille - 1; break;

            case 3: lowerx = g->taille / 2; lowery = g->taille / 2; upperx = g->taille - 1; uppery = g->taille - 1; break;
            }
            //printf("\n%d : \n",j);
            //printf("%d %d %d %d\n",lowerx,upperx,lowery,uppery);
            do {
                posx = (rand() % (upperx - lowerx + 1)) + lowerx;
                posy = (rand() % (uppery - lowery + 1)) + lowery;
                //printf("%d | %d\n",posx,posy);
            } while (g->tab[posy][posx] == -1);
            g->tab[posy][posx] = -1;

        }
    }
    //printGrille(g);
}
void resetGrid(Grille* grid) {
    for (int i = 0; i < grid->taille; i++) {
        for (int j = 0; j < grid->taille; j++) {
            grid->tab[i][j] = -1;
        }
    }
}

Grille* UniqueSolve(Grille* g) {
    List* liste = Newlist();
    Grille* tmp = cloneGrille(g);
    int nb = nbsolution(tmp, liste);
    while (nb == 0) {

        resetList(liste);
        resetGrid(g);
        g = randomFill(g, g->taille);

        randomEmpty(g);

        tmp = cloneGrille(g);
        nb = nbsolution(tmp, liste);

    }
    if (nb == 1) { return g; }
    while (nb > 1) {

        //printGrille(g);
        for (int i = 0; i < g->taille; ++i) {
            for (int j = 0; j < g->taille; ++j) {
                if (liste->head->g->tab[i][j] != liste->head->next->g->tab[i][j]) {
                    g->tab[i][j] = liste->head->g->tab[i][j];
                }
            }
        }
        resetList(liste);
        tmp = cloneGrille(g);
        nb = nbsolution(tmp, liste);
    }
    return g;
}



Grille* GenerateGrid(int taille) {
    srand(time(NULL));
    Grille* tmp = Newgrille();
    tmp = randomFill(tmp, taille);
    randomEmpty(tmp);
    tmp = UniqueSolve(tmp);
    return tmp;
}