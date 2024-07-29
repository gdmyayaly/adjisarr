




-- Canaux
INSERT INTO Canaux (Nom)
VALUES 
('T�l�phone'),
('Email'),
('Chat en ligne');

-- Motifs
INSERT INTO Motifs (Nom)
VALUES 
('Probl�me r�seau'),
('Demande �quipement'),
('Facturation');

-- SousMotifs
INSERT INTO SousMotifs (Nom)
VALUES 
('Probl�me donn�es mobiles'),
('Probl�me wifi'),
('Changement �quipements domestiques'),
('Contestation facture');

-- TypeServices
INSERT INTO TypeServices (Nom)
VALUES 
('Internet'),
('T�l�vision'),
('T�l�phonie');

-- EntitesSupports
INSERT INTO EntitesSupports (NomEntite)
VALUES 
('Support N1 Dakar'),
('Support N2 Thi�s'),
('Support N3 Saint-Louis');

-- Prestataires
INSERT INTO Prestataires (NomPrestateur, Responsable)
VALUES 
('Teranga Tech Services', 1),
('Dakar Digital Solutions', 0),
('S�n�gal Telecom Services', 0);

-- Teleconseillers
INSERT INTO Teleconseillers (UtilisateurId, PrestataireId, Responsable)
VALUES 
(1, 1, 0),  -- Aminata Fall, Teranga Tech Services, non responsable
(2, 2, 1),  -- Ousmane Diop, Dakar Digital Solutions, responsable
(3, 3, 0);

-- Comptes
INSERT INTO Comptes (NomCompte, TypeCompte, DateOuverture, Solde, StatutCompte)
VALUES 
('Diop Entreprises', 'Professionnel', GETDATE(), 1000000.00, 'Actif'),
('Ndiaye Family', 'Particulier', GETDATE(), 50000.00, 'Actif'),
('Sow Technologies', 'Professionnel', GETDATE(), 2000000.00, 'Actif');

-- Contacts
INSERT INTO Contacts (Nom, Prenom, Telephone, Adresse, StatutContact, CompteId)
VALUES 
('Diop', 'Moussa', '771234567', 'Rue 10 x 11 M�dina, Dakar', 'Actif', 1),
('Ndiaye', 'Fatou', '782345678', 'Cit� Keur Gorgui, Dakar', 'Actif', 2),
('Sow', 'Abdoulaye', '763456789', 'Mermoz, Dakar', 'Actif', 3);

-- Services
INSERT INTO Services (NomService, TypeService, TypeServiceId)
VALUES 
('Internet Fibre Rapide', 'Internet', 1),
('TV HD Teranga', 'T�l�vision', 2),
('T�l�phonie Fixe Jamono', 'T�l�phonie', 3);

-- Agents
INSERT INTO Agents (UtilisateurId, EntiteId, Responsable)
VALUES 
(1, 1, 0),
(2, 2, 1),
(3, 1, 0);
INSERT INTO [gt2db].[dbo].[Priorite] (Nom, Latence) 
VALUES 
('Haute', '00:05:00'),
('Moyenne', '00:30:00'),
('Basse', '01:00:00');
-- Incidents
-- Insertion des donn�es dans la table Incidents
-- Insertion des donn�es dans la table Incidents

INSERT INTO Incidents (
    CanalId, MotifId, SousMotifId, Description, Commentaire, StatutIncident, 
    ContactId, ServiceId, Disponiblite, DateEcheance, PrioriteId, TeleconseillerId, EntiteSupportId
) VALUES 
(1, 1, 2, 'Probl�me de connexion wifi � Yoff', 'Client ne peut pas se connecter depuis hier soir', 'Nouveau', 1, 1, 0, '2024-07-30 12:00:00', 1, 1, 1),
(2, 2, 3, 'Demande de d�codeur suppl�mentaire', 'Client souhaite un d�codeur pour sa seconde r�sidence � Saly', 'En cours', 2, 2, 0, '2024-07-30 12:00:00', 2, 2, 2),
(1, 1, 1, 'Lenteur du r�seau mobile � Ouakam', 'D�bit tr�s lent depuis les travaux dans le quartier', 'Nouveau', 3, 1, 0, '2024-07-30 12:00:00', 3, 3, 3);


-- AgentIncident
INSERT INTO AgentIncident (AgentId, IncidentId, DateAffectation, Commentaire)
VALUES 
(1, 2, GETDATE(), 'Incident affect� � Moussa de l''�quipe Dakar'),
(2, 2, GETDATE(), 'Incident urgent transmis � l''�quipe de Thi�s'),
(3, 3, GETDATE(), 'En attente de l''intervention de l''�quipe technique de Ouakam');

-- Insertion des utilisateurs s�n�galais dans la table Utilisateur

INSERT INTO Utilisateur (
    Nom, Prenom, Adresse, UserName, NormalizedUserName, Email, NormalizedEmail, EmailConfirmed, PasswordHash, SecurityStamp, ConcurrencyStamp, PhoneNumber, PhoneNumberConfirmed, TwoFactorEnabled, LockoutEnd, LockoutEnabled, AccessFailedCount
) VALUES 
('Diop', 'Moussa', 'Rue 10 x 11 M�dina, Dakar', 'moussa.diop', 'MOUSSA.DIOP', 'moussa.diop@example.com', 'MOUSSA.DIOP@EXAMPLE.COM', 1, 'hashed_password_1', '', '', '771234567', 1, 0, NULL, 1, 0);


-- SELECT pour v�rifier l'insertion
SELECT TOP (1000) [Id]
      ,[Nom]
      ,[Prenom]
      ,[Adresse]
      ,[UserName]
      ,[NormalizedUserName]
      ,[Email]
      ,[NormalizedEmail]
      ,[EmailConfirmed

