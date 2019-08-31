<?php

use Illuminate\Database\Seeder;

class DroitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         * ------------------------------------------------------------------------
         * S for all access
         * R for read only
         * C for create only
         * U for update only
         * D for delete only
         * A for CRU
         * B for CR
         * E for RU
         * ------------------------------------------------------------------------
         */

    /**
     * =========================================================================
     * Admin Access
     * =========================================================================
     */
        $droits_admin_ans_sco = new \App\Models\Droit();
        $droits_admin_ans_sco->codeRole = 'SuperAdmin';
        $droits_admin_ans_sco->codeElement = '48c5m_AnneeScolaire';
        $droits_admin_ans_sco->droit = 'S';
        $droits_admin_ans_sco->save();

        $droits_admin_ans_sco_etab = new \App\Models\Droit();
        $droits_admin_ans_sco_etab->codeRole = 'SuperAdmin';
        $droits_admin_ans_sco_etab->codeElement = '48c5m_AnneScolaireEtablissement';
        $droits_admin_ans_sco_etab->droit = 'S';
        $droits_admin_ans_sco_etab->save();

        $droits_admin_apprecie = new \App\Models\Droit();
        $droits_admin_apprecie->codeRole = 'SuperAdmin';
        $droits_admin_apprecie->codeElement = '48c5m_Appreciations';
        $droits_admin_apprecie->droit = 'S';
        $droits_admin_apprecie->save();

        $droits_admin_bulletin = new \App\Models\Droit();
        $droits_admin_bulletin->codeRole = 'SuperAdmin';
        $droits_admin_bulletin->codeElement = '48c5m_Bulletiins';
        $droits_admin_bulletin->droit = 'S';
        $droits_admin_bulletin->save();

        $droits_admin_classe = new \App\Models\Droit();
        $droits_admin_classe->codeRole = 'SuperAdmin';
        $droits_admin_classe->codeElement = '48c5m_Classe';
        $droits_admin_classe->droit = 'S';
        $droits_admin_classe->save();

        $droits_admin_cours = new \App\Models\Droit();
        $droits_admin_cours->codeRole = 'SuperAdmin';
        $droits_admin_cours->codeElement = '48c5m_Cours';
        $droits_admin_cours->droit = 'S';
        $droits_admin_cours->save();

        $droits_admin_droit = new \App\Models\Droit();
        $droits_admin_droit->codeRole = 'SuperAdmin';
        $droits_admin_droit->codeElement = '48c5m_Droits';
        $droits_admin_droit->droit = 'S';
        $droits_admin_droit->save();

        $droits_admin_element = new \App\Models\Droit();
        $droits_admin_element->codeRole = 'SuperAdmin';
        $droits_admin_element->codeElement = '48c5m_Element';
        $droits_admin_element->droit = 'S';
        $droits_admin_element->save();

        $droits_admin_eleve = new \App\Models\Droit();
        $droits_admin_eleve->codeRole = 'SuperAdmin';
        $droits_admin_eleve->codeElement = '48c5m_Eleve';
        $droits_admin_eleve->droit = 'S';
        $droits_admin_eleve->save();

        $droits_admin_enseignant = new \App\Models\Droit();
        $droits_admin_enseignant->codeRole = 'SuperAdmin';
        $droits_admin_enseignant->codeElement = '48c5m_Enseignant';
        $droits_admin_enseignant->droit = 'S';
        $droits_admin_enseignant->save();

        $droits_admin_enseignant_classe = new \App\Models\Droit();
        $droits_admin_enseignant_classe->codeRole = 'SuperAdmin';
        $droits_admin_enseignant_classe->codeElement = '48c5m_EnseignantClasse';
        $droits_admin_enseignant_classe->droit = 'S';
        $droits_admin_enseignant_classe->save();

        $droits_admin_etablissement = new \App\Models\Droit();
        $droits_admin_etablissement->codeRole = 'SuperAdmin';
        $droits_admin_etablissement->codeElement = '48c5m_Etablissement';
        $droits_admin_etablissement->droit = 'S';
        $droits_admin_etablissement->save();

        $droits_admin_evaluation = new \App\Models\Droit();
        $droits_admin_evaluation->codeRole = 'SuperAdmin';
        $droits_admin_evaluation->codeElement = '48c5m_Evaluation';
        $droits_admin_evaluation->droit = 'S';
        $droits_admin_evaluation->save();

        $droits_admin_inscription = new \App\Models\Droit();
        $droits_admin_inscription->codeRole = 'SuperAdmin';
        $droits_admin_inscription->codeElement = '48c5m_Inscription';
        $droits_admin_inscription->droit = 'S';
        $droits_admin_inscription->save();

        $droits_admin_matiere = new \App\Models\Droit();
        $droits_admin_matiere->codeRole = 'SuperAdmin';
        $droits_admin_matiere->codeElement = '48c5m_Matiere';
        $droits_admin_matiere->droit = 'S';
        $droits_admin_matiere->save();

        $droits_admin_matiere_classe = new \App\Models\Droit();
        $droits_admin_matiere_classe->codeRole = 'SuperAdmin';
        $droits_admin_matiere_classe->codeElement = '48c5m_MatieresDeClasses';
        $droits_admin_matiere_classe->droit = 'S';
        $droits_admin_matiere_classe->save();

        $droits_admin_moyenne_ans = new \App\Models\Droit();
        $droits_admin_moyenne_ans->codeRole = 'SuperAdmin';
        $droits_admin_moyenne_ans->codeElement = '48c5m_MoyennesAnnuelles';
        $droits_admin_moyenne_ans->droit = 'S';
        $droits_admin_moyenne_ans->save();

        $droits_admin_moyenne_periode = new \App\Models\Droit();
        $droits_admin_moyenne_periode->codeRole = 'SuperAdmin';
        $droits_admin_moyenne_periode->codeElement = '48c5m_MoyennePeriode';
        $droits_admin_moyenne_periode->droit = 'S';
        $droits_admin_moyenne_periode->save();

        $droits_admin_moyenne_matiere = new \App\Models\Droit();
        $droits_admin_moyenne_matiere->codeRole = 'SuperAdmin';
        $droits_admin_moyenne_matiere->codeElement = '48c5m_MoyenneMatiere';
        $droits_admin_moyenne_matiere->droit = 'S';
        $droits_admin_moyenne_matiere->save();

        $droits_admin_niveau = new \App\Models\Droit();
        $droits_admin_niveau->codeRole = 'SuperAdmin';
        $droits_admin_niveau->codeElement = '48c5m_Niveau';
        $droits_admin_niveau->droit = 'S';
        $droits_admin_niveau->save();

        $droits_admin_note = new \App\Models\Droit();
        $droits_admin_note->codeRole = 'SuperAdmin';
        $droits_admin_note->codeElement = '48c5m_Notes';
        $droits_admin_note->droit = 'S';
        $droits_admin_note->save();

        $droits_admin_parent_eleve = new \App\Models\Droit();
        $droits_admin_parent_eleve->codeRole = 'SuperAdmin';
        $droits_admin_parent_eleve->codeElement = '48c5m_ParentEleves';
        $droits_admin_parent_eleve->droit = 'S';
        $droits_admin_parent_eleve->save();

        $droits_admin_parent = new \App\Models\Droit();
        $droits_admin_parent->codeRole = 'SuperAdmin';
        $droits_admin_parent->codeElement = '48c5m_Parents';
        $droits_admin_parent->droit = 'S';
        $droits_admin_parent->save();

        $droits_admin_profile = new \App\Models\Droit();
        $droits_admin_profile->codeRole = 'SuperAdmin';
        $droits_admin_profile->codeElement = '48c5m_Profile';
        $droits_admin_profile->droit = 'S';
        $droits_admin_profile->save();

        $droits_admin_role = new \App\Models\Droit();
        $droits_admin_role->codeRole = 'SuperAdmin';
        $droits_admin_role->codeElement = '48c5m_Role';
        $droits_admin_role->droit = 'S';
        $droits_admin_role->save();

        $droits_admin_utilisateur = new \App\Models\Droit();
        $droits_admin_utilisateur->codeRole = 'SuperAdmin';
        $droits_admin_utilisateur->codeElement = '48c5m_Utilisateur';
        $droits_admin_utilisateur->droit = 'S';
        $droits_admin_utilisateur->save();

        /**
         * =========================================================================
         * Direction Etablissement Access
         * =========================================================================
         */
        $droits_admin_ans_sco = new \App\Models\Droit();
        $droits_admin_ans_sco->codeRole = 'User0';
        $droits_admin_ans_sco->codeElement = '48c5m_AnneeScolaire';
        $droits_admin_ans_sco->droit = 'S';
        $droits_admin_ans_sco->save();

        $droits_admin_ans_sco_etab = new \App\Models\Droit();
        $droits_admin_ans_sco_etab->codeRole = 'User0';
        $droits_admin_ans_sco_etab->codeElement = '48c5m_AnneScolaireEtablissement';
        $droits_admin_ans_sco_etab->droit = 'S';
        $droits_admin_ans_sco_etab->save();

        $droits_admin_apprecie = new \App\Models\Droit();
        $droits_admin_apprecie->codeRole = 'User0';
        $droits_admin_apprecie->codeElement = '48c5m_Appreciations';
        $droits_admin_apprecie->droit = 'S';
        $droits_admin_apprecie->save();

        $droits_admin_bulletin = new \App\Models\Droit();
        $droits_admin_bulletin->codeRole = 'User0';
        $droits_admin_bulletin->codeElement = '48c5m_Bulletiins';
        $droits_admin_bulletin->droit = 'S';
        $droits_admin_bulletin->save();

        $droits_admin_classe = new \App\Models\Droit();
        $droits_admin_classe->codeRole = 'User0';
        $droits_admin_classe->codeElement = '48c5m_Classe';
        $droits_admin_classe->droit = 'S';
        $droits_admin_classe->save();

        $droits_admin_cours = new \App\Models\Droit();
        $droits_admin_cours->codeRole = 'User0';
        $droits_admin_cours->codeElement = '48c5m_Cours';
        $droits_admin_cours->droit = 'S';
        $droits_admin_cours->save();

        $droits_admin_eleve = new \App\Models\Droit();
        $droits_admin_eleve->codeRole = 'User0';
        $droits_admin_eleve->codeElement = '48c5m_Eleve';
        $droits_admin_eleve->droit = 'S';
        $droits_admin_eleve->save();

        $droits_admin_enseignant = new \App\Models\Droit();
        $droits_admin_enseignant->codeRole = 'User0';
        $droits_admin_enseignant->codeElement = '48c5m_Enseignant';
        $droits_admin_enseignant->droit = 'S';
        $droits_admin_enseignant->save();

        $droits_admin_enseignant_classe = new \App\Models\Droit();
        $droits_admin_enseignant_classe->codeRole = 'User0';
        $droits_admin_enseignant_classe->codeElement = '48c5m_EnseignantClasse';
        $droits_admin_enseignant_classe->droit = 'S';
        $droits_admin_enseignant_classe->save();

        $droits_admin_etablissement = new \App\Models\Droit();
        $droits_admin_etablissement->codeRole = 'User0';
        $droits_admin_etablissement->codeElement = '48c5m_Etablissement';
        $droits_admin_etablissement->droit = 'S';
        $droits_admin_etablissement->save();

        $droits_admin_evaluation = new \App\Models\Droit();
        $droits_admin_evaluation->codeRole = 'User0';
        $droits_admin_evaluation->codeElement = '48c5m_Evaluation';
        $droits_admin_evaluation->droit = 'S';
        $droits_admin_evaluation->save();

        $droits_admin_inscription = new \App\Models\Droit();
        $droits_admin_inscription->codeRole = 'User0';
        $droits_admin_inscription->codeElement = '48c5m_Inscription';
        $droits_admin_inscription->droit = 'S';
        $droits_admin_inscription->save();

        $droits_admin_matiere = new \App\Models\Droit();
        $droits_admin_matiere->codeRole = 'User0';
        $droits_admin_matiere->codeElement = '48c5m_Matiere';
        $droits_admin_matiere->droit = 'S';
        $droits_admin_matiere->save();

        $droits_admin_matiere_classe = new \App\Models\Droit();
        $droits_admin_matiere_classe->codeRole = 'User0';
        $droits_admin_matiere_classe->codeElement = '48c5m_MatieresDeClasses';
        $droits_admin_matiere_classe->droit = 'S';
        $droits_admin_matiere_classe->save();

        $droits_admin_moyenne_ans = new \App\Models\Droit();
        $droits_admin_moyenne_ans->codeRole = 'User0';
        $droits_admin_moyenne_ans->codeElement = '48c5m_MoyennesAnnuelles';
        $droits_admin_moyenne_ans->droit = 'S';
        $droits_admin_moyenne_ans->save();

        $droits_admin_moyenne_periode = new \App\Models\Droit();
        $droits_admin_moyenne_periode->codeRole = 'User0';
        $droits_admin_moyenne_periode->codeElement = '48c5m_MoyennePeriode';
        $droits_admin_moyenne_periode->droit = 'S';
        $droits_admin_moyenne_periode->save();

        $droits_admin_moyenne_matiere = new \App\Models\Droit();
        $droits_admin_moyenne_matiere->codeRole = 'User0';
        $droits_admin_moyenne_matiere->codeElement = '48c5m_MoyenneMatiere';
        $droits_admin_moyenne_matiere->droit = 'S';
        $droits_admin_moyenne_matiere->save();

        $droits_admin_niveau = new \App\Models\Droit();
        $droits_admin_niveau->codeRole = 'User0';
        $droits_admin_niveau->codeElement = '48c5m_Niveau';
        $droits_admin_niveau->droit = 'S';
        $droits_admin_niveau->save();

        $droits_admin_note = new \App\Models\Droit();
        $droits_admin_note->codeRole = 'User0';
        $droits_admin_note->codeElement = '48c5m_Notes';
        $droits_admin_note->droit = 'S';
        $droits_admin_note->save();

        $droits_admin_parent_eleve = new \App\Models\Droit();
        $droits_admin_parent_eleve->codeRole = 'User0';
        $droits_admin_parent_eleve->codeElement = '48c5m_ParentEleves';
        $droits_admin_parent_eleve->droit = 'S';
        $droits_admin_parent_eleve->save();

        $droits_admin_parent = new \App\Models\Droit();
        $droits_admin_parent->codeRole = 'User0';
        $droits_admin_parent->codeElement = '48c5m_Parents';
        $droits_admin_parent->droit = 'S';
        $droits_admin_parent->save();

        $droits_admin_profile = new \App\Models\Droit();
        $droits_admin_profile->codeRole = 'User0';
        $droits_admin_profile->codeElement = '48c5m_Profile';
        $droits_admin_profile->droit = 'S';
        $droits_admin_profile->save();

        $droits_admin_role = new \App\Models\Droit();
        $droits_admin_role->codeRole = 'User0';
        $droits_admin_role->codeElement = '48c5m_Role';
        $droits_admin_role->droit = 'S';
        $droits_admin_role->save();

        $droits_admin_utilisateur = new \App\Models\Droit();
        $droits_admin_utilisateur->codeRole = 'User0';
        $droits_admin_utilisateur->codeElement = '48c5m_Utilisateur';
        $droits_admin_utilisateur->droit = 'S';
        $droits_admin_utilisateur->save();

        /**
         * =========================================================================
         * Parent Access
         * =========================================================================
         */
        $droits_admin_ans_sco = new \App\Models\Droit();
        $droits_admin_ans_sco->codeRole = 'Parent';
        $droits_admin_ans_sco->codeElement = '48c5m_AnneeScolaire';
        $droits_admin_ans_sco->droit = 'R';
        $droits_admin_ans_sco->save();

        $droits_admin_ans_sco_etab = new \App\Models\Droit();
        $droits_admin_ans_sco_etab->codeRole = 'Parent';
        $droits_admin_ans_sco_etab->codeElement = '48c5m_AnneScolaireEtablissement';
        $droits_admin_ans_sco_etab->droit = 'R';
        $droits_admin_ans_sco_etab->save();

        $droits_admin_apprecie = new \App\Models\Droit();
        $droits_admin_apprecie->codeRole = 'Parent';
        $droits_admin_apprecie->codeElement = '48c5m_Appreciations';
        $droits_admin_apprecie->droit = 'R';
        $droits_admin_apprecie->save();

        $droits_admin_bulletin = new \App\Models\Droit();
        $droits_admin_bulletin->codeRole = 'Parent';
        $droits_admin_bulletin->codeElement = '48c5m_Bulletiins';
        $droits_admin_bulletin->droit = 'R';
        $droits_admin_bulletin->save();

        $droits_admin_classe = new \App\Models\Droit();
        $droits_admin_classe->codeRole = 'Parent';
        $droits_admin_classe->codeElement = '48c5m_Classe';
        $droits_admin_classe->droit = 'R';
        $droits_admin_classe->save();

        $droits_admin_cours = new \App\Models\Droit();
        $droits_admin_cours->codeRole = 'Parent';
        $droits_admin_cours->codeElement = '48c5m_Cours';
        $droits_admin_cours->droit = 'R';
        $droits_admin_cours->save();

        $droits_admin_eleve = new \App\Models\Droit();
        $droits_admin_eleve->codeRole = 'Parent';
        $droits_admin_eleve->codeElement = '48c5m_Eleve';
        $droits_admin_eleve->droit = 'R';
        $droits_admin_eleve->save();

        $droits_admin_enseignant = new \App\Models\Droit();
        $droits_admin_enseignant->codeRole = 'Parent';
        $droits_admin_enseignant->codeElement = '48c5m_Enseignant';
        $droits_admin_enseignant->droit = 'R';
        $droits_admin_enseignant->save();

        $droits_admin_enseignant_classe = new \App\Models\Droit();
        $droits_admin_enseignant_classe->codeRole = 'Parent';
        $droits_admin_enseignant_classe->codeElement = '48c5m_EnseignantClasse';
        $droits_admin_enseignant_classe->droit = 'R';
        $droits_admin_enseignant_classe->save();

        $droits_admin_etablissement = new \App\Models\Droit();
        $droits_admin_etablissement->codeRole = 'Parent';
        $droits_admin_etablissement->codeElement = '48c5m_Etablissement';
        $droits_admin_etablissement->droit = 'R';
        $droits_admin_etablissement->save();

        $droits_admin_evaluation = new \App\Models\Droit();
        $droits_admin_evaluation->codeRole = 'Parent';
        $droits_admin_evaluation->codeElement = '48c5m_Evaluation';
        $droits_admin_evaluation->droit = 'R';
        $droits_admin_evaluation->save();

        $droits_admin_inscription = new \App\Models\Droit();
        $droits_admin_inscription->codeRole = 'Parent';
        $droits_admin_inscription->codeElement = '48c5m_Inscription';
        $droits_admin_inscription->droit = 'R';
        $droits_admin_inscription->save();

        $droits_admin_matiere = new \App\Models\Droit();
        $droits_admin_matiere->codeRole = 'Parent';
        $droits_admin_matiere->codeElement = '48c5m_Matiere';
        $droits_admin_matiere->droit = 'R';
        $droits_admin_matiere->save();

        $droits_admin_matiere_classe = new \App\Models\Droit();
        $droits_admin_matiere_classe->codeRole = 'Parent';
        $droits_admin_matiere_classe->codeElement = '48c5m_MatieresDeClasses';
        $droits_admin_matiere_classe->droit = 'R';
        $droits_admin_matiere_classe->save();

        $droits_admin_moyenne_ans = new \App\Models\Droit();
        $droits_admin_moyenne_ans->codeRole = 'Parent';
        $droits_admin_moyenne_ans->codeElement = '48c5m_MoyennesAnnuelles';
        $droits_admin_moyenne_ans->droit = 'R';
        $droits_admin_moyenne_ans->save();

        $droits_admin_moyenne_periode = new \App\Models\Droit();
        $droits_admin_moyenne_periode->codeRole = 'Parent';
        $droits_admin_moyenne_periode->codeElement = '48c5m_MoyennePeriode';
        $droits_admin_moyenne_periode->droit = 'R';
        $droits_admin_moyenne_periode->save();

        $droits_admin_moyenne_matiere = new \App\Models\Droit();
        $droits_admin_moyenne_matiere->codeRole = 'Parent';
        $droits_admin_moyenne_matiere->codeElement = '48c5m_MoyenneMatiere';
        $droits_admin_moyenne_matiere->droit = 'R';
        $droits_admin_moyenne_matiere->save();

        $droits_admin_niveau = new \App\Models\Droit();
        $droits_admin_niveau->codeRole = 'Parent';
        $droits_admin_niveau->codeElement = '48c5m_Niveau';
        $droits_admin_niveau->droit = 'R';
        $droits_admin_niveau->save();

        $droits_admin_note = new \App\Models\Droit();
        $droits_admin_note->codeRole = 'Parent';
        $droits_admin_note->codeElement = '48c5m_Notes';
        $droits_admin_note->droit = 'R';
        $droits_admin_note->save();

        $droits_admin_parent_eleve = new \App\Models\Droit();
        $droits_admin_parent_eleve->codeRole = 'Parent';
        $droits_admin_parent_eleve->codeElement = '48c5m_ParentEleves';
        $droits_admin_parent_eleve->droit = 'R';
        $droits_admin_parent_eleve->save();

        $droits_admin_parent = new \App\Models\Droit();
        $droits_admin_parent->codeRole = 'Parent';
        $droits_admin_parent->codeElement = '48c5m_Parents';
        $droits_admin_parent->droit = 'R';
        $droits_admin_parent->save();

        $droits_admin_utilisateur = new \App\Models\Droit();
        $droits_admin_utilisateur->codeRole = 'Parent';
        $droits_admin_utilisateur->codeElement = '48c5m_Utilisateur';
        $droits_admin_utilisateur->droit = 'R';
        $droits_admin_utilisateur->save();

        /**
         * =========================================================================
         * Enseignant Access
         * =========================================================================
         */
        $droits_admin_ans_sco = new \App\Models\Droit();
        $droits_admin_ans_sco->codeRole = 'Enseignant';
        $droits_admin_ans_sco->codeElement = '48c5m_AnneeScolaire';
        $droits_admin_ans_sco->droit = 'R';
        $droits_admin_ans_sco->save();

        $droits_admin_ans_sco_etab = new \App\Models\Droit();
        $droits_admin_ans_sco_etab->codeRole = 'Enseignant';
        $droits_admin_ans_sco_etab->codeElement = '48c5m_AnneScolaireEtablissement';
        $droits_admin_ans_sco_etab->droit = 'R';
        $droits_admin_ans_sco_etab->save();

        $droits_admin_apprecie = new \App\Models\Droit();
        $droits_admin_apprecie->codeRole = 'Enseignant';
        $droits_admin_apprecie->codeElement = '48c5m_Appreciations';
        $droits_admin_apprecie->droit = 'R';
        $droits_admin_apprecie->save();

        $droits_admin_bulletin = new \App\Models\Droit();
        $droits_admin_bulletin->codeRole = 'Enseignant';
        $droits_admin_bulletin->codeElement = '48c5m_Bulletiins';
        $droits_admin_bulletin->droit = 'R';
        $droits_admin_bulletin->save();

        $droits_admin_classe = new \App\Models\Droit();
        $droits_admin_classe->codeRole = 'Enseignant';
        $droits_admin_classe->codeElement = '48c5m_Classe';
        $droits_admin_classe->droit = 'R';
        $droits_admin_classe->save();

        $droits_admin_cours = new \App\Models\Droit();
        $droits_admin_cours->codeRole = 'Enseignant';
        $droits_admin_cours->codeElement = '48c5m_Cours';
        $droits_admin_cours->droit = 'R';
        $droits_admin_cours->save();

        $droits_admin_eleve = new \App\Models\Droit();
        $droits_admin_eleve->codeRole = 'Enseignant';
        $droits_admin_eleve->codeElement = '48c5m_Eleve';
        $droits_admin_eleve->droit = 'R';
        $droits_admin_eleve->save();

        $droits_admin_enseignant = new \App\Models\Droit();
        $droits_admin_enseignant->codeRole = 'Enseignant';
        $droits_admin_enseignant->codeElement = '48c5m_Enseignant';
        $droits_admin_enseignant->droit = 'R';
        $droits_admin_enseignant->save();

        $droits_admin_enseignant_classe = new \App\Models\Droit();
        $droits_admin_enseignant_classe->codeRole = 'Enseignant';
        $droits_admin_enseignant_classe->codeElement = '48c5m_EnseignantClasse';
        $droits_admin_enseignant_classe->droit = 'R';
        $droits_admin_enseignant_classe->save();

        $droits_admin_etablissement = new \App\Models\Droit();
        $droits_admin_etablissement->codeRole = 'Enseignant';
        $droits_admin_etablissement->codeElement = '48c5m_Etablissement';
        $droits_admin_etablissement->droit = 'R';
        $droits_admin_etablissement->save();

        $droits_admin_evaluation = new \App\Models\Droit();
        $droits_admin_evaluation->codeRole = 'Enseignant';
        $droits_admin_evaluation->codeElement = '48c5m_Evaluation';
        $droits_admin_evaluation->droit = 'R';
        $droits_admin_evaluation->save();

        $droits_admin_inscription = new \App\Models\Droit();
        $droits_admin_inscription->codeRole = 'Enseignant';
        $droits_admin_inscription->codeElement = '48c5m_Inscription';
        $droits_admin_inscription->droit = 'R';
        $droits_admin_inscription->save();

        $droits_admin_matiere = new \App\Models\Droit();
        $droits_admin_matiere->codeRole = 'Enseignant';
        $droits_admin_matiere->codeElement = '48c5m_Matiere';
        $droits_admin_matiere->droit = 'R';
        $droits_admin_matiere->save();

        $droits_admin_matiere_classe = new \App\Models\Droit();
        $droits_admin_matiere_classe->codeRole = 'Enseignant';
        $droits_admin_matiere_classe->codeElement = '48c5m_MatieresDeClasses';
        $droits_admin_matiere_classe->droit = 'R';
        $droits_admin_matiere_classe->save();

        $droits_admin_moyenne_ans = new \App\Models\Droit();
        $droits_admin_moyenne_ans->codeRole = 'Enseignant';
        $droits_admin_moyenne_ans->codeElement = '48c5m_MoyennesAnnuelles';
        $droits_admin_moyenne_ans->droit = 'R';
        $droits_admin_moyenne_ans->save();

        $droits_admin_moyenne_periode = new \App\Models\Droit();
        $droits_admin_moyenne_periode->codeRole = 'Enseignant';
        $droits_admin_moyenne_periode->codeElement = '48c5m_MoyennePeriode';
        $droits_admin_moyenne_periode->droit = 'R';
        $droits_admin_moyenne_periode->save();

        $droits_admin_moyenne_matiere = new \App\Models\Droit();
        $droits_admin_moyenne_matiere->codeRole = 'Enseignant';
        $droits_admin_moyenne_matiere->codeElement = '48c5m_MoyenneMatiere';
        $droits_admin_moyenne_matiere->droit = 'R';
        $droits_admin_moyenne_matiere->save();

        $droits_admin_niveau = new \App\Models\Droit();
        $droits_admin_niveau->codeRole = 'Enseignant';
        $droits_admin_niveau->codeElement = '48c5m_Niveau';
        $droits_admin_niveau->droit = 'R';
        $droits_admin_niveau->save();

        $droits_admin_note = new \App\Models\Droit();
        $droits_admin_note->codeRole = 'Enseignant';
        $droits_admin_note->codeElement = '48c5m_Notes';
        $droits_admin_note->droit = 'R';
        $droits_admin_note->save();

        $droits_admin_parent_eleve = new \App\Models\Droit();
        $droits_admin_parent_eleve->codeRole = 'Enseignant';
        $droits_admin_parent_eleve->codeElement = '48c5m_ParentEleves';
        $droits_admin_parent_eleve->droit = 'R';
        $droits_admin_parent_eleve->save();

        $droits_admin_parent = new \App\Models\Droit();
        $droits_admin_parent->codeRole = 'Enseignant';
        $droits_admin_parent->codeElement = '48c5m_Parents';
        $droits_admin_parent->droit = 'R';
        $droits_admin_parent->save();

        $droits_admin_utilisateur = new \App\Models\Droit();
        $droits_admin_utilisateur->codeRole = 'Enseignant';
        $droits_admin_utilisateur->codeElement = '48c5m_Utilisateur';
        $droits_admin_utilisateur->droit = 'R';
        $droits_admin_utilisateur->save();
    }
}
