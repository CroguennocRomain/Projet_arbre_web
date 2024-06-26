import sys
import os
import json

import numpy as np
import pandas as pd
from sklearn.linear_model import SGDClassifier
from sklearn.model_selection import train_test_split
from sklearn.preprocessing import StandardScaler, OrdinalEncoder
from sklearn.neighbors import KNeighborsClassifier
from sklearn import svm, tree
import pickle


def predire_age(values, method):
    
    base_path = os.path.dirname(os.path.abspath(__file__))
    ord_path = os.path.join(base_path, 'OrdinalEncoder', 'ordinal_encoder2.pkl')

    # Charger l'encodeur depuis le fichier
    with open(ord_path, 'rb') as file:
        encoder = pickle.load(file)

    # Colonnes utilisées lors de l'entraînement du OrdinalEncoder
    encoder_cols = encoder.feature_names_in_

    # Ajouter valeurs entrées dans un dictionnaire
    data_input = {}
    if len(values) == 5:
        data_input['haut_tot'] = float(values[0])
        data_input['haut_tronc'] = float(values[1])
        data_input['tronc_diam'] = float(values[2])
        data_input['fk_stadedev'] = values[3]
        data_input['fk_nomtech'] = values[4]
    else:
        print("Erreur : Il faut entrer 6 arguments")

    # Convertir le dictionnaire en DataFrame
    df = pd.DataFrame([data_input])

    base_path = os.path.dirname(os.path.abspath(__file__))
    data_path = os.path.join(base_path, 'Data_Arbre.csv')

    data_arbre = pd.read_csv(data_path)
    # Ajouter les colonnes manquantes avec des valeurs par défaut
    for colonne in data_arbre.columns:
        if colonne not in df.columns:
            df[colonne] = data_arbre[colonne][0]

    # Réorganiser les colonnes pour correspondre à l'ordre des colonnes originales
    new_data_df = df[data_arbre.columns]

    # Sélectionner les colonnes de la nouvelle ligne de données
    categorical_columns = [colonne for colonne in new_data_df if new_data_df[colonne].dtype == 'object']
    # Appliquer l'encodeur sur les colonnes sélectionnées de la nouvelle ligne de données
    new_data_df[categorical_columns] = encoder.transform(new_data_df[categorical_columns])

    df = new_data_df
    df['age_group'] = 0

    # Ajouter colonnes pour normalisation
    for col in ['haut_tot', 'haut_tronc', 'tronc_diam']:
        df[col] = data_input[col]
    for col in ['age_estim', 'clc_nbr_diag', 'fk_prec_estim', 'latitude', 'longitude']:
        df[col] = 0

    # Réorganiser colonnes
    norm_cols = ['longitude','latitude','clc_quartier','clc_secteur','haut_tot','haut_tronc',
                 'tronc_diam','fk_arb_etat','fk_stadedev','fk_port','fk_pied','fk_situation',
                 'fk_revetement','age_estim','fk_prec_estim','clc_nbr_diag','fk_nomtech','villeca',
                 'feuillage','remarquable', 'age_group'
                 ]
    df = df[norm_cols]
    
    base_path = os.path.dirname(os.path.abspath(__file__))
    scal_path = os.path.join(base_path, 'Scaler', 'scaler2.pkl')

    with open(scal_path, "rb") as f:
        scaler = pickle.load(f)
    df_norm = scaler.transform(df)
    df_norm = pd.DataFrame(df_norm, columns=norm_cols)

    # Mettre notre instance à prédire sous le bon format
    arbre = np.array([[float(df_norm['haut_tot'][0]), float(df_norm['haut_tronc'][0]), float(df_norm['tronc_diam'][0]),
                       float(df_norm['fk_stadedev'][0]), float(df_norm['fk_nomtech'][0])]])
    X = df_norm[['haut_tot', 'haut_tronc', 'tronc_diam', 'fk_stadedev', 'fk_nomtech']]

    # Sélection du modèle d'apprentissage
    
    base_path = os.path.dirname(os.path.abspath(__file__))
    model0_path = os.path.join(base_path, 'models', 'age_SGD.pkl')
    base_path = os.path.dirname(os.path.abspath(__file__))
    model1_path = os.path.join(base_path, 'models', 'age_neigh.pkl')
    base_path = os.path.dirname(os.path.abspath(__file__))
    model2_path = os.path.join(base_path, 'models', 'age_SVM.pkl')
    base_path = os.path.dirname(os.path.abspath(__file__))
    model3_path = os.path.join(base_path, 'models', 'age_tree.pkl')


    if method == '0':
        with open(model0_path, "rb") as f:
            model = pickle.load(f)
    elif method == '1':
        with open(model1_path, "rb") as f:
            model = pickle.load(f)
    elif method == '2':
        with open(model2_path, "rb") as f:
            model = pickle.load(f)
    elif method == '3':
        with open(model3_path, "rb") as f:
            model = pickle.load(f)

    # Proba de chaque classe
    classes = model.predict_proba(X)

    # Créer structure json
    json_data = {}
    json_data['0-10'] = classes[0][0]
    json_data['11-20'] = classes[0][1]
    json_data['21-30'] = classes[0][2]
    json_data['31-40'] = classes[0][3]
    json_data['41-50'] = classes[0][4]
    json_data['51-100'] = classes[0][5]
    json_data['101-200'] = classes[0][6]

    base_path = os.path.dirname(os.path.abspath(__file__))
    json_path = os.path.join(base_path, 'JSON', 'script2_result.json')

    with open(json_path, 'w') as json_file:
        json.dump(json_data, json_file)

    # Renvoie les données en format json
    return json.dumps(json_data)


# On récupère les arguments noms de colonnes dans features
features = []
# On récupère l'indice du dernier argument correspondant au modèle
i_last_arg = len(sys.argv) - 1  # -1 car on ne compte pas argv[0] qui est le nom du script
for i in range(1, i_last_arg):
    features.append(sys.argv[i])


age = predire_age(features, sys.argv[i_last_arg])
print(age)
