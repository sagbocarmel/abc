<?php

use App\Models\Element;
use Illuminate\Database\Seeder;

class ElementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $element_annee_scolaire = new Element();
        $element_annee_scolaire->codeElement = '48c5m_AnneeScolaire';
        $element_annee_scolaire->description = 'Table des années scolaires ';
        $element_annee_scolaire->save();

        $element_annee_scolaire_etablissement = new Element();
        $element_annee_scolaire_etablissement->codeElement = '48c5m_AnneScolaireEtablissement';
        $element_annee_scolaire_etablissement->description = 'Table de Spécification  des années scolaires dans les établissement';
        $element_annee_scolaire_etablissement->save();

        $element_appreciation = new Element();
        $element_appreciation->codeElement = '48c5m_Appreciations';
        $element_appreciation->description = 'Table ';
        $element_appreciation->save();

        $element_bulletin = new Element();
        $element_bulletin->codeElement = '48c5m_Bulletiins';
        $element_bulletin->description = 'Table de stockage des bulletins de notes';
        $element_bulletin->save();

        $element_classe = new Element();
        $element_classe->codeElement = '48c5m_Classe';
        $element_classe->description = 'Table des classes disponibles dans un établissement';
        $element_classe->save();

        $element_cours = new Element();
        $element_cours->codeElement = '48c5m_Cours';
        $element_cours->description = 'Table des cours programmées pour une classe dans un établissement pour une année';
        $element_cours->save();

        $element_droit = new Element();
        $element_droit->codeElement = '48c5m_Droits';
        $element_droit->description = 'Table des accès utilisateurs sur un élément de la table';
        $element_droit->save();

        $element_element = new Element();
        $element_element->codeElement = '48c5m_Element';
        $element_element->description = 'Table de la liste des tables de la bases de données';
        $element_element->save();

        $element_eleve = new Element();
        $element_eleve->codeElement = '48c5m_Eleve';
        $element_eleve->description = 'Table des élèves de tout le système';
        $element_eleve->save();

        $element_enseignant = new Element();
        $element_enseignant->codeElement = '48c5m_Enseignant';
        $element_enseignant->description = 'Table de tout les enseignants du Systèmes';
        $element_enseignant->save();

        $element_enseignant_classe = new Element();
        $element_enseignant_classe->codeElement = '48c5m_EnseignantClasse';
        $element_enseignant_classe->description = 'Table des enseignants dans pour une classe d\'un éablissement';
        $element_enseignant_classe->save();

        $element_etablissement = new Element();
        $element_etablissement->codeElement = '48c5m_Etablissement';
        $element_etablissement->description = 'Table  des Établissement';
        $element_etablissement->save();

        $element_evaluation = new Element();
        $element_evaluation->codeElement = '48c5m_Evaluation';
        $element_evaluation->description = 'Table des évaluations qui ont eu lieu dans les établissement';
        $element_evaluation->save();

        $element_inscription = new Element();
        $element_inscription->codeElement = '48c5m_Inscription';
        $element_inscription->description = 'Table des inscriptions des élèves dans une classe d\'un établissement';
        $element_inscription->save();

        $element_matiere = new Element();
        $element_matiere->codeElement = '48c5m_Matiere';
        $element_matiere->description = 'Table des matieres de chaque établissement';
        $element_matiere->save();

        $element_matiere_classe = new Element();
        $element_matiere_classe->codeElement = '48c5m_MatieresDeClasses';
        $element_matiere_classe->description = 'Table des matieres enseignées dans chaque classe';
        $element_matiere_classe->save();

        $element_moyennes_annuelles = new Element();
        $element_moyennes_annuelles->codeElement = '48c5m_MoyennesAnnuelles';
        $element_moyennes_annuelles->description = 'Table des moyennes annuelles des élèves';
        $element_moyennes_annuelles->save();

        $element_moyenne_matiere = new Element();
        $element_moyenne_matiere->codeElement = '48c5m_MoyenneMatiere';
        $element_moyenne_matiere->description = 'Table des moyennes de chaque élève dans chaque matiere';
        $element_moyenne_matiere->save();

        $element_moyenne_periode = new Element();
        $element_moyenne_periode->codeElement = '48c5m_MoyennePeriode';
        $element_moyenne_periode->description = 'Table des moyenne des élèves par période';
        $element_moyenne_periode->save();

        $element_niveau = new Element();
        $element_niveau->codeElement = '48c5m_Niveau';
        $element_niveau->description = 'Table des niveau d\'études primaire secondaire et maternelle';
        $element_niveau->save();

        $element_note = new Element();
        $element_note->codeElement = '48c5m_Notes';
        $element_note->description = 'Table des notes pour différentes évaluations';
        $element_note->save();

        $element_parent_eleve = new Element();
        $element_parent_eleve->codeElement = '48c5m_ParentEleves';
        $element_parent_eleve->description = 'Table des liens entre parents et élèves';
        $element_parent_eleve->save();

        $element_parent = new Element();
        $element_parent->codeElement = '48c5m_Parents';
        $element_parent->description = 'Table de l\'ensemble des parents d\'élève';
        $element_parent->save();

        $element_profile = new Element();
        $element_profile->codeElement = '48c5m_Profile';
        $element_profile->description = 'Table des profiles des utilisateurs du Système';
        $element_profile->save();

        $element_role = new Element();
        $element_role->codeElement = '48c5m_Role';
        $element_role->description = 'Table des rôles dans le système';
        $element_role->save();

        $element_utilisateur = new Element();
        $element_utilisateur->codeElement = '48c5m_Utilisateur';
        $element_utilisateur->description = 'Table des utilisateurs dans le système';
        $element_utilisateur->save();

    }
}
