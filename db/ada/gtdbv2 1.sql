




-- Canaux
INSERT INTO Canaux (Nom)
VALUES 
('Téléphone'),
('Email'),
('Chat en ligne');

-- Motifs
INSERT INTO Motifs (Nom)
VALUES 
('Problème réseau'),
('Demande équipement'),
('Facturation');

-- SousMotifs
INSERT INTO SousMotifs (Nom)
VALUES 
('Problème données mobiles'),
('Problème wifi'),
('Changement équipements domestiques'),
('Contestation facture');

-- TypeServices
INSERT INTO TypeServices (Nom)
VALUES 
('Internet'),
('Télévision'),
('Téléphonie');

-- EntitesSupports
INSERT INTO EntitesSupports (NomEntite)
VALUES 
('Support N1 Dakar'),
('Support N2 Thiès'),
('Support N3 Saint-Louis');

-- Prestataires
INSERT INTO Prestataires (NomPrestateur, Responsable)
VALUES 
('Teranga Tech Services', 1),
('Dakar Digital Solutions', 0),
('Sénégal Telecom Services', 0);

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
('Diop', 'Moussa', '771234567', 'Rue 10 x 11 Médina, Dakar', 'Actif', 1),
('Ndiaye', 'Fatou', '782345678', 'Cité Keur Gorgui, Dakar', 'Actif', 2),
('Sow', 'Abdoulaye', '763456789', 'Mermoz, Dakar', 'Actif', 3);

-- Services
INSERT INTO Services (NomService, TypeService, TypeServiceId)
VALUES 
('Internet Fibre Rapide', 'Internet', 1),
('TV HD Teranga', 'Télévision', 2),
('Téléphonie Fixe Jamono', 'Téléphonie', 3);

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
-- Insertion des données dans la table Incidents
-- Insertion des données dans la table Incidents

INSERT INTO Incidents (
    CanalId, MotifId, SousMotifId, Description, Commentaire, StatutIncident, 
    ContactId, ServiceId, Disponiblite, DateEcheance, PrioriteId, TeleconseillerId, EntiteSupportId
) VALUES 
(1, 1, 2, 'Problème de connexion wifi à Yoff', 'Client ne peut pas se connecter depuis hier soir', 'Nouveau', 1, 1, 0, '2024-07-30 12:00:00', 1, 1, 1),
(2, 2, 3, 'Demande de décodeur supplémentaire', 'Client souhaite un décodeur pour sa seconde résidence à Saly', 'En cours', 2, 2, 0, '2024-07-30 12:00:00', 2, 2, 2),
(1, 1, 1, 'Lenteur du réseau mobile à Ouakam', 'Débit très lent depuis les travaux dans le quartier', 'Nouveau', 3, 1, 0, '2024-07-30 12:00:00', 3, 3, 3);


-- AgentIncident
INSERT INTO AgentIncident (AgentId, IncidentId, DateAffectation, Commentaire)
VALUES 
(1, 2, GETDATE(), 'Incident affecté à Moussa de l''équipe Dakar'),
(2, 2, GETDATE(), 'Incident urgent transmis à l''équipe de Thiès'),
(3, 3, GETDATE(), 'En attente de l''intervention de l''équipe technique de Ouakam');

-- Insertion des utilisateurs sénégalais dans la table Utilisateur

INSERT INTO Utilisateur (
    Nom, Prenom, Adresse, UserName, NormalizedUserName, Email, NormalizedEmail, EmailConfirmed, PasswordHash, SecurityStamp, ConcurrencyStamp, PhoneNumber, PhoneNumberConfirmed, TwoFactorEnabled, LockoutEnd, LockoutEnabled, AccessFailedCount
) VALUES 
('Diop', 'Moussa', 'Rue 10 x 11 Médina, Dakar', 'moussa.diop', 'MOUSSA.DIOP', 'moussa.diop@example.com', 'MOUSSA.DIOP@EXAMPLE.COM', 1, 'hashed_password_1', '', '', '771234567', 1, 0, NULL, 1, 0);


-- SELECT pour vérifier l'insertion
SELECT TOP (1000) [Id]
      ,[Nom]
      ,[Prenom]
      ,[Adresse]
      ,[UserName]
      ,[NormalizedUserName]
      ,[Email]
      ,[NormalizedEmail]
      ,[EmailConfirmed

