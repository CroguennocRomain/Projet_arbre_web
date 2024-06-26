import sys
import os
import json
import numpy as np
import pandas as pd
from sklearn.cluster import KMeans
from sklearn.preprocessing import OrdinalEncoder
import pickle

def main():
    #vérifier qu'il y a bien le bon nombre d'argument
    if len(sys.argv) != 6:
        print('Usage: python script_fonc1.py <haut_tot> <haut_tronc> <fk_stadedev> <fk_nomtech> <feuillage> ----> Exemple: python script_fonc1.py 15.1 2.1 "Adulte" "PINNIGnig" "Conifère"')
        sys.exit(1)


    base_path = os.path.dirname(os.path.abspath(__file__))
    ord_path = os.path.join(base_path, 'OrdinalEncoder', 'ordinal_encoder1.pkl')

    # Charger l'encodeur depuis le fichier
    with open(ord_path, 'rb') as file:
        encoder = pickle.load(file)

    # Nouvelle ligne de données à encoder
    new_data = {
        'haut_tot': [float(sys.argv[1])],
        'haut_tronc': [float(sys.argv[2])],
        'fk_stadedev': [sys.argv[3]],
        'fk_nomtech': [sys.argv[4]],
        'feuillage': [sys.argv[5]]

    }

    # Convertir en DataFrame
    new_data_df = pd.DataFrame(new_data)

    base_path = os.path.dirname(os.path.abspath(__file__))
    data_path = os.path.join(base_path, 'Data_Arbre.csv')

    # Charger les données originales pour obtenir la structure complète
    data = pd.read_csv(data_path)

    # Ajouter les colonnes manquantes avec des valeurs par défaut
    for colonne in data.columns:
        if colonne not in new_data_df.columns:
            new_data_df[colonne] = data[colonne][0]

    # Réorganiser les colonnes pour correspondre à l'ordre des colonnes originales
    new_data_df = new_data_df[data.columns]

    # Sélectionner les colonnes de la nouvelle ligne de données
    categorical_columns = [colonne for colonne in new_data_df if new_data_df[colonne].dtype == 'object']

    # Appliquer l'encodeur sur les colonnes sélectionnées de la nouvelle ligne de données
    new_data_df[categorical_columns] = encoder.transform(new_data_df[categorical_columns])

    base_path = os.path.dirname(os.path.abspath(__file__))
    scal_path = os.path.join(base_path, 'Scaler', 'scaler1.pkl')

    # Charger le scaler depuis le fichier (pour normaliser)
    with open(scal_path, "rb") as file:
        scaler = pickle.load(file)
    new_data_df = scaler.transform(new_data_df)
    new_data_df = pd.DataFrame(new_data_df, columns=data.columns)

    base_path = os.path.dirname(os.path.abspath(__file__))
    centroids_path = os.path.join(base_path, 'centroids.csv')

    # Charger les centroids
    centroids_data = pd.read_csv(centroids_path)

    # Les colonnes utilisées pour les centroids
    features = [f'feature_{i}' for i in range(centroids_data.shape[1])]

    # Extraire les colonnes de new_data_df qui correspondent aux features utilisées pour les centroids
    new_data_renamed = new_data_df[['haut_tot', 'haut_tronc', 'fk_stadedev', 'fk_nomtech', 'feuillage']]
    new_data_renamed.columns = features

    # Calculer la distance euclidienne entre la nouvelle ligne et chaque centroid
    distances = np.linalg.norm(centroids_data.values - new_data_renamed.values, axis=1)

    # Attribuer le cluster correspondant au centroid le plus proche
    closest_centroid = np.argmin(distances)
    print(f'La nouvelle ligne appartient au cluster {closest_centroid}')

    # Renvoyer un fichier JSON contenant le cluster auquel appartient la nouvelle ligne
    
    base_path = os.path.dirname(os.path.abspath(__file__))
    json_path = os.path.join(base_path, 'JSON', 'script1_result.json')

    with open(json_path, 'w') as f:
        json.dump(int(closest_centroid), f)

    # renvoyer un fichier JSON contenant le cluster auquel apartient la nouvelle ligne
    return json.dumps(int(closest_centroid))

if __name__ == '__main__':
    main()




