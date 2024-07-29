-- Création de la base de données
CREATE DATABASE gt2db;
USE gt2db;

-- Création de la table __EFMigrationsHistory
CREATE TABLE `__EFMigrationsHistory` (
    `MigrationId` VARCHAR(150) NOT NULL,
    `ProductVersion` VARCHAR(32) NOT NULL,
    PRIMARY KEY (`MigrationId`)
);

-- Création de la table Canaux
CREATE TABLE `Canaux` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Nom` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`Id`)
);

-- Création de la table Comptes
CREATE TABLE `Comptes` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `NomCompte` VARCHAR(255) NOT NULL,
    `TypeCompte` VARCHAR(255) NOT NULL,
    `DateOuverture` DATETIME NOT NULL,
    `StatutCompte` VARCHAR(255) NOT NULL,
    `Solde` DECIMAL(18,2) NOT NULL,
    PRIMARY KEY (`Id`)
);

-- Création de la table EntitesSupports
CREATE TABLE `EntitesSupports` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `NomEntite` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`Id`)
);

-- Création de la table Motifs
CREATE TABLE `Motifs` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Nom` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`Id`)
);

-- Création de la table Prestataires
CREATE TABLE `Prestataires` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `NomPrestateur` VARCHAR(255) NOT NULL,
    `Responsable` BOOLEAN NOT NULL,
    PRIMARY KEY (`Id`)
);

-- Création de la table Priorite
CREATE TABLE `Priorite` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Nom` VARCHAR(255) NOT NULL,
    `Latence` DATETIME NOT NULL,
    PRIMARY KEY (`Id`)
);

-- Création de la table RevoquerTokens
CREATE TABLE `RevoquerTokens` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Token` VARCHAR(255),
    `DateRevoquer` DATETIME NOT NULL,
    `IsRevoquer` BOOLEAN NOT NULL,
    PRIMARY KEY (`Id`)
);

-- Création de la table RoleClaims
CREATE TABLE `RoleClaims` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `RoleId` VARCHAR(255),
    `ClaimType` VARCHAR(255),
    `ClaimValue` VARCHAR(255),
    PRIMARY KEY (`Id`)
);

-- Création de la table Roles
CREATE TABLE `Roles` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Name` VARCHAR(255),
    `NormalizedName` VARCHAR(255),
    `ConcurrencyStamp` VARCHAR(255),
    PRIMARY KEY (`Id`)
);

-- Création de la table SousMotifs
CREATE TABLE `SousMotifs` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Nom` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`Id`)
);

-- Création de la table TypeServices
CREATE TABLE `TypeServices` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Nom` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`Id`)
);

-- Création de la table UserClaims
CREATE TABLE `UserClaims` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `UserId` VARCHAR(255),
    `ClaimType` VARCHAR(255),
    `ClaimValue` VARCHAR(255),
    PRIMARY KEY (`Id`)
);

-- Création de la table UserTokens
CREATE TABLE `UserTokens` (
    `UserId` VARCHAR(450) NOT NULL,
    `LoginProvider` VARCHAR(450) NOT NULL,
    `Name` VARCHAR(450) NOT NULL,
    `Value` VARCHAR(255),
    PRIMARY KEY (`UserId`, `LoginProvider`, `Name`)
);

-- Création de la table Utilisateur
CREATE TABLE `Utilisateur` (
    `Id` VARCHAR(450) NOT NULL,
    `Nom` VARCHAR(255) NOT NULL,
    `Prenom` VARCHAR(255) NOT NULL,
    `Adresse` VARCHAR(255),
    `UserName` VARCHAR(255),
    `NormalizedUserName` VARCHAR(255),
    `Email` VARCHAR(255),
    `NormalizedEmail` VARCHAR(255),
    `EmailConfirmed` BOOLEAN NOT NULL,
    `PasswordHash` VARCHAR(255),
    `SecurityStamp` VARCHAR(255),
    `ConcurrencyStamp` VARCHAR(255),
    `PhoneNumber` VARCHAR(255),
    `PhoneNumberConfirmed` BOOLEAN NOT NULL,
    `TwoFactorEnabled` BOOLEAN NOT NULL,
    `LockoutEnd` DATETIME,
    `LockoutEnabled` BOOLEAN NOT NULL,
    `AccessFailedCount` INT NOT NULL,
    PRIMARY KEY (`Id`)
);

-- Création de la table Contacts
CREATE TABLE `Contacts` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `Nom` VARCHAR(255) NOT NULL,
    `Prenom` VARCHAR(255) NOT NULL,
    `Telephone` VARCHAR(255) NOT NULL,
    `Adresse` VARCHAR(255) NOT NULL,
    `StatutContact` VARCHAR(255) NOT NULL,
    `CompteId` INT NOT NULL,
    PRIMARY KEY (`Id`),
    FOREIGN KEY (`CompteId`) REFERENCES `Comptes` (`Id`) ON DELETE CASCADE
);

-- Création de la table UserRoles
CREATE TABLE `UserRoles` (
    `UserId` VARCHAR(450) NOT NULL,
    `RoleId` VARCHAR(450) NOT NULL,
    PRIMARY KEY (`UserId`, `RoleId`),
    FOREIGN KEY (`RoleId`) REFERENCES `Roles` (`Id`) ON DELETE CASCADE
);

-- Création de la table Services
CREATE TABLE `Services` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `NomService` VARCHAR(255) NOT NULL,
    `TypeService` VARCHAR(255) NOT NULL,
    `TypeServiceId` INT,
    PRIMARY KEY (`Id`),
    FOREIGN KEY (`TypeServiceId`) REFERENCES `TypeServices` (`Id`)
);

-- Création de la table Agents
CREATE TABLE `Agents` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `UtilisateurId` VARCHAR(450),
    `EntiteId` INT NOT NULL,
    `Responsable` BOOLEAN NOT NULL,
    PRIMARY KEY (`Id`),
    FOREIGN KEY (`EntiteId`) REFERENCES `EntitesSupports` (`Id`) ON DELETE CASCADE,
    FOREIGN KEY (`UtilisateurId`) REFERENCES `Utilisateur` (`Id`)
);

-- Création de la table Teleconseillers
CREATE TABLE `Teleconseillers` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `UtilisateurId` VARCHAR(450),
    `PrestataireId` INT NOT NULL,
    `Responsable` BOOLEAN NOT NULL,
    PRIMARY KEY (`Id`),
    FOREIGN KEY (`PrestataireId`) REFERENCES `Prestataires` (`Id`) ON DELETE CASCADE,
    FOREIGN KEY (`UtilisateurId`) REFERENCES `Utilisateur` (`Id`)
);

-- Création de la table UserLogins
CREATE TABLE `UserLogins` (
    `LoginProvider` VARCHAR(450) NOT NULL,
    `ProviderKey` VARCHAR(450) NOT NULL,
    `ProviderDisplayName` VARCHAR(255),
    `UserId` VARCHAR(450),
    PRIMARY KEY (`LoginProvider`, `ProviderKey`),
    FOREIGN KEY (`UserId`) REFERENCES `Utilisateur` (`Id`)
);

-- Création de la table Factures
CREATE TABLE `Factures` (
    `CompteId` INT NOT NULL,
    `ServiceId` INT NOT NULL,
    `Montant` DECIMAL(18,2) NOT NULL,
    `DateFacturation` DATETIME NOT NULL,
    `DatePaiement` DATETIME NOT NULL,
    `DateExpiration` DATETIME NOT NULL,
    `StatutFacture` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`CompteId`, `ServiceId`),
    FOREIGN KEY (`CompteId`) REFERENCES `Comptes` (`Id`) ON DELETE CASCADE,
    FOREIGN KEY (`ServiceId`) REFERENCES `Services` (`Id`) ON DELETE CASCADE
);

-- Création de la table Incidents
CREATE TABLE `Incidents` (
    `Id` INT NOT NULL AUTO_INCREMENT,
    `CanalId` INT NOT NULL,
    `MotifId` INT NOT NULL,
    `SousMotifId` INT NOT NULL,
    `Description` VARCHAR(255) NOT NULL,
    `Commentaire` VARCHAR(255),
    `StatutIncident` VARCHAR(255) NOT NULL,
    `ContactId` INT NOT NULL,
    `ServiceId` INT NOT NULL,
    `Disponiblite` BOOLEAN NOT NULL,
    `DateEcheance` DATETIME,
    `PrioriteId` INT NOT NULL,
    `TeleconseillerId` INT NOT NULL,
    `EntiteSupportId` INT,
    PRIMARY KEY (`Id`),
    FOREIGN KEY (`CanalId`) REFERENCES `Canaux` (`Id`) ON DELETE CASCADE,
    FOREIGN KEY (`ContactId`) REFERENCES `Contacts` (`Id`) ON DELETE CASCADE,
    FOREIGN KEY (`EntiteSupportId`) REFERENCES `EntitesSupports` (`Id`),
    FOREIGN KEY (`MotifId`) REFERENCES `Motifs` (`Id`) ON DELETE CASCADE,
    FOREIGN KEY (`PrioriteId`) REFERENCES `Priorite` (`Id`) ON DELETE CASCADE,
    FOREIGN KEY (`ServiceId`) REFERENCES `Services` (`Id`) ON DELETE CASCADE,
    FOREIGN KEY (`SousMotifId`) REFERENCES `SousMotifs` (`Id`) ON DELETE CASCADE,
    FOREIGN KEY (`TeleconseillerId`) REFERENCES `Teleconseillers` (`Id`) ON DELETE CASCADE
);

-- Indexes for table `RoleClaims`
CREATE INDEX `IX_RoleClaims_RoleId` ON `RoleClaims` (`RoleId`);

-- Indexes for table `UserClaims`
CREATE INDEX `IX_UserClaims_UserId` ON `UserClaims` (`UserId`);

-- Indexes for table `UserRoles`
CREATE INDEX `IX_UserRoles_RoleId` ON `UserRoles` (`RoleId`);

-- Indexes for table `UserLogins`
CREATE INDEX `IX_UserLogins_UserId` ON `UserLogins` (`UserId`);

-- Indexes for table `Agents`
CREATE INDEX `IX_Agents_UtilisateurId` ON `Agents` (`UtilisateurId`);

-- Indexes for table `Incidents`
CREATE INDEX `IX_Incidents_CanalId` ON `Incidents` (`CanalId`);
CREATE INDEX `IX_Incidents_ContactId` ON `Incidents` (`ContactId`);
CREATE INDEX `IX_Incidents_EntiteSupportId` ON `Incidents` (`EntiteSupportId`);
CREATE INDEX `IX_Incidents_MotifId` ON `Incidents` (`MotifId`);
CREATE INDEX `IX_Incidents_PrioriteId` ON `Incidents` (`PrioriteId`);
CREATE INDEX `IX_Incidents_ServiceId` ON `Incidents` (`ServiceId`);
CREATE INDEX `IX_Incidents_SousMotifId` ON `Incidents` (`SousMotifId`);
CREATE INDEX `IX_Incidents_TeleconseillerId` ON `Incidents` (`TeleconseillerId`);

-- Indexes for table `Teleconseillers`
CREATE INDEX `IX_Teleconseillers_UtilisateurId` ON `Teleconseillers` (`UtilisateurId`);

-- Indexes for table `UserTokens`
CREATE INDEX `IX_UserTokens_UserId` ON `UserTokens` (`UserId`);
