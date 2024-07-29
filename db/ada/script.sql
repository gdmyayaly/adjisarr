Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (169ms) [Parameters=[], CommandType='Text', CommandTimeout='60']
      CREATE DATABASE [gt2db];
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (61ms) [Parameters=[], CommandType='Text', CommandTimeout='60']
      IF SERVERPROPERTY('EngineEdition') <> 5
      BEGIN
          ALTER DATABASE [gt2db] SET READ_COMMITTED_SNAPSHOT ON;
      END;
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (7ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      SELECT 1
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (11ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [__EFMigrationsHistory] (
          [MigrationId] nvarchar(150) NOT NULL,
          [ProductVersion] nvarchar(32) NOT NULL,
          CONSTRAINT [PK___EFMigrationsHistory] PRIMARY KEY ([MigrationId])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      SELECT 1
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (15ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      SELECT OBJECT_ID(N'[__EFMigrationsHistory]');
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (9ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      SELECT [MigrationId], [ProductVersion]
      FROM [__EFMigrationsHistory]
      ORDER BY [MigrationId];
Microsoft.EntityFrameworkCore.Migrations[20402]
      Applying migration '20240725161101_InitialCreate'.
Applying migration '20240725161101_InitialCreate'.
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (7ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Canaux] (
          [Id] int NOT NULL IDENTITY,
          [Nom] nvarchar(max) NOT NULL,
          CONSTRAINT [PK_Canaux] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Comptes] (
          [Id] int NOT NULL IDENTITY,
          [NomCompte] nvarchar(max) NOT NULL,
          [TypeCompte] nvarchar(max) NOT NULL,
          [DateOuverture] datetime2 NOT NULL,
          [StatutCompte] nvarchar(max) NOT NULL,
          [Solde] decimal(18,2) NOT NULL,
          CONSTRAINT [PK_Comptes] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [EntitesSupports] (
          [Id] int NOT NULL IDENTITY,
          [NomEntite] nvarchar(max) NOT NULL,
          CONSTRAINT [PK_EntitesSupports] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Motifs] (
          [Id] int NOT NULL IDENTITY,
          [Nom] nvarchar(max) NOT NULL,
          CONSTRAINT [PK_Motifs] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Prestataires] (
          [Id] int NOT NULL IDENTITY,
          [NomPrestateur] nvarchar(max) NOT NULL,
          [Responsable] bit NOT NULL,
          CONSTRAINT [PK_Prestataires] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Priorite] (
          [Id] int NOT NULL IDENTITY,
          [Nom] nvarchar(max) NOT NULL,
          [Latence] datetime2 NOT NULL,
          CONSTRAINT [PK_Priorite] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [RevoquerTokens] (
          [Id] nvarchar(450) NOT NULL,
          [Token] nvarchar(max) NULL,
          [DateRevoquer] datetime2 NOT NULL,
          [IsRevoquer] bit NOT NULL,
          CONSTRAINT [PK_RevoquerTokens] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [RoleClaims] (
          [Id] int NOT NULL IDENTITY,
          [RoleId] nvarchar(max) NULL,
          [ClaimType] nvarchar(max) NULL,
          [ClaimValue] nvarchar(max) NULL,
          CONSTRAINT [PK_RoleClaims] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Roles] (
          [Id] nvarchar(450) NOT NULL,
          [Name] nvarchar(max) NULL,
          [NormalizedName] nvarchar(max) NULL,
          [ConcurrencyStamp] nvarchar(max) NULL,
          CONSTRAINT [PK_Roles] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [SousMotifs] (
          [Id] int NOT NULL IDENTITY,
          [Nom] nvarchar(max) NOT NULL,
          CONSTRAINT [PK_SousMotifs] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [TypeServices] (
          [Id] int NOT NULL IDENTITY,
          [Nom] nvarchar(max) NOT NULL,
          CONSTRAINT [PK_TypeServices] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [UserClaims] (
          [Id] int NOT NULL IDENTITY,
          [UserId] nvarchar(max) NULL,
          [ClaimType] nvarchar(max) NULL,
          [ClaimValue] nvarchar(max) NULL,
          CONSTRAINT [PK_UserClaims] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (7ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [UserTokens] (
          [UserId] nvarchar(450) NOT NULL,
          [LoginProvider] nvarchar(450) NOT NULL,
          [Name] nvarchar(450) NOT NULL,
          [Value] nvarchar(max) NULL,
          CONSTRAINT [PK_UserTokens] PRIMARY KEY ([UserId], [LoginProvider], [Name])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Utilisateur] (
          [Id] nvarchar(450) NOT NULL,
          [Nom] nvarchar(max) NOT NULL,
          [Prenom] nvarchar(max) NOT NULL,
          [Adresse] nvarchar(max) NULL,
          [UserName] nvarchar(max) NULL,
          [NormalizedUserName] nvarchar(max) NULL,
          [Email] nvarchar(max) NULL,
          [NormalizedEmail] nvarchar(max) NULL,
          [EmailConfirmed] bit NOT NULL,
          [PasswordHash] nvarchar(max) NULL,
          [SecurityStamp] nvarchar(max) NULL,
          [ConcurrencyStamp] nvarchar(max) NULL,
          [PhoneNumber] nvarchar(max) NULL,
          [PhoneNumberConfirmed] bit NOT NULL,
          [TwoFactorEnabled] bit NOT NULL,
          [LockoutEnd] datetimeoffset NULL,
          [LockoutEnabled] bit NOT NULL,
          [AccessFailedCount] int NOT NULL,
          CONSTRAINT [PK_Utilisateur] PRIMARY KEY ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (3ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Contacts] (
          [Id] int NOT NULL IDENTITY,
          [Nom] nvarchar(max) NOT NULL,
          [Prenom] nvarchar(max) NOT NULL,
          [Telephone] nvarchar(max) NOT NULL,
          [Adresse] nvarchar(max) NOT NULL,
          [StatutContact] nvarchar(max) NOT NULL,
          [CompteId] int NOT NULL,
          CONSTRAINT [PK_Contacts] PRIMARY KEY ([Id]),
          CONSTRAINT [FK_Contacts_Comptes_CompteId] FOREIGN KEY ([CompteId]) REFERENCES [Comptes] ([Id]) ON DELETE CASCADE
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [UserRoles] (
          [UserId] nvarchar(450) NOT NULL,
          [RoleId] nvarchar(450) NOT NULL,
          CONSTRAINT [PK_UserRoles] PRIMARY KEY ([UserId], [RoleId]),
          CONSTRAINT [FK_UserRoles_Roles_RoleId] FOREIGN KEY ([RoleId]) REFERENCES [Roles] ([Id]) ON DELETE CASCADE
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Services] (
          [Id] int NOT NULL IDENTITY,
          [NomService] nvarchar(max) NOT NULL,
          [TypeService] nvarchar(max) NOT NULL,
          [TypeServiceId] int NULL,
          CONSTRAINT [PK_Services] PRIMARY KEY ([Id]),
          CONSTRAINT [FK_Services_TypeServices_TypeServiceId] FOREIGN KEY ([TypeServiceId]) REFERENCES [TypeServices] ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Agents] (
          [Id] int NOT NULL IDENTITY,
          [UtilisateurId] nvarchar(450) NULL,
          [EntiteId] int NOT NULL,
          [Responsable] bit NOT NULL,
          CONSTRAINT [PK_Agents] PRIMARY KEY ([Id]),
          CONSTRAINT [FK_Agents_EntitesSupports_EntiteId] FOREIGN KEY ([EntiteId]) REFERENCES [EntitesSupports] ([Id]) ON DELETE CASCADE,
          CONSTRAINT [FK_Agents_Utilisateur_UtilisateurId] FOREIGN KEY ([UtilisateurId]) REFERENCES [Utilisateur] ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Teleconseillers] (
          [Id] int NOT NULL IDENTITY,
          [UtilisateurId] nvarchar(450) NULL,
          [PrestataireId] int NOT NULL,
          [Responsable] bit NOT NULL,
          CONSTRAINT [PK_Teleconseillers] PRIMARY KEY ([Id]),
          CONSTRAINT [FK_Teleconseillers_Prestataires_PrestataireId] FOREIGN KEY ([PrestataireId]) REFERENCES [Prestataires] ([Id]) ON DELETE CASCADE,
          CONSTRAINT [FK_Teleconseillers_Utilisateur_UtilisateurId] FOREIGN KEY ([UtilisateurId]) REFERENCES [Utilisateur] ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [UserLogins] (
          [LoginProvider] nvarchar(450) NOT NULL,
          [ProviderKey] nvarchar(450) NOT NULL,
          [ProviderDisplayName] nvarchar(max) NULL,
          [UserId] nvarchar(450) NULL,
          CONSTRAINT [PK_UserLogins] PRIMARY KEY ([LoginProvider], [ProviderKey]),
          CONSTRAINT [FK_UserLogins_Utilisateur_UserId] FOREIGN KEY ([UserId]) REFERENCES [Utilisateur] ([Id])
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Factures] (
          [CompteId] int NOT NULL,
          [ServiceId] int NOT NULL,
          [Montant] decimal(18,2) NOT NULL,
          [DateFacturation] datetime2 NOT NULL,
          [DatePaiement] datetime2 NOT NULL,
          [DateExpiration] datetime2 NOT NULL,
          [StatutFacture] nvarchar(max) NOT NULL,
          CONSTRAINT [PK_Factures] PRIMARY KEY ([CompteId], [ServiceId]),
          CONSTRAINT [FK_Factures_Comptes_CompteId] FOREIGN KEY ([CompteId]) REFERENCES [Comptes] ([Id]) ON DELETE CASCADE,
          CONSTRAINT [FK_Factures_Services_ServiceId] FOREIGN KEY ([ServiceId]) REFERENCES [Services] ([Id]) ON DELETE CASCADE
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (4ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Incidents] (
          [Id] int NOT NULL IDENTITY,
          [CanalId] int NOT NULL,
          [MotifId] int NOT NULL,
          [SousMotifId] int NOT NULL,
          [Description] nvarchar(max) NOT NULL,
          [Commentaire] nvarchar(max) NULL,
          [StatutIncident] nvarchar(max) NOT NULL,
          [ContactId] int NOT NULL,
          [ServiceId] int NOT NULL,
          [Disponiblite] bit NOT NULL,
          [DateEcheance] datetime2 NULL,
          [PrioriteId] int NOT NULL,
          [TeleconseillerId] int NOT NULL,
          [EntiteSupportId] int NULL,
          CONSTRAINT [PK_Incidents] PRIMARY KEY ([Id]),
          CONSTRAINT [FK_Incidents_Canaux_CanalId] FOREIGN KEY ([CanalId]) REFERENCES [Canaux] ([Id]) ON DELETE CASCADE,
          CONSTRAINT [FK_Incidents_Contacts_ContactId] FOREIGN KEY ([ContactId]) REFERENCES [Contacts] ([Id]) ON DELETE CASCADE,
          CONSTRAINT [FK_Incidents_EntitesSupports_EntiteSupportId] FOREIGN KEY ([EntiteSupportId]) REFERENCES [EntitesSupports] ([Id]),
          CONSTRAINT [FK_Incidents_Motifs_MotifId] FOREIGN KEY ([MotifId]) REFERENCES [Motifs] ([Id]) ON DELETE CASCADE,
          CONSTRAINT [FK_Incidents_Priorite_PrioriteId] FOREIGN KEY ([PrioriteId]) REFERENCES [Priorite] ([Id]) ON DELETE CASCADE,
          CONSTRAINT [FK_Incidents_Services_ServiceId] FOREIGN KEY ([ServiceId]) REFERENCES [Services] ([Id]) ON DELETE CASCADE,
          CONSTRAINT [FK_Incidents_SousMotifs_SousMotifId] FOREIGN KEY ([SousMotifId]) REFERENCES [SousMotifs] ([Id]) ON DELETE CASCADE,
          CONSTRAINT [FK_Incidents_Teleconseillers_TeleconseillerId] FOREIGN KEY ([TeleconseillerId]) REFERENCES [Teleconseillers] ([Id]) ON DELETE CASCADE
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (5ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [AgentIncident] (
          [AgentId] int NOT NULL,
          [IncidentId] int NOT NULL,
          [DateAffectation] datetime2 NOT NULL,
          [Commentaire] nvarchar(max) NOT NULL,
          CONSTRAINT [PK_AgentIncident] PRIMARY KEY ([AgentId], [IncidentId]),
          CONSTRAINT [FK_AgentIncident_Agents_IncidentId] FOREIGN KEY ([IncidentId]) REFERENCES [Agents] ([Id]) ON DELETE CASCADE,
          CONSTRAINT [FK_AgentIncident_Incidents_IncidentId] FOREIGN KEY ([IncidentId]) REFERENCES [Incidents] ([Id]) ON DELETE CASCADE
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (15ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE TABLE [Esclade] (
          [Id] int NOT NULL IDENTITY,
          [EntiteSupportId] int NOT NULL,
          [IncidentId] int NOT NULL,
          [Commentaire] nvarchar(max) NOT NULL,
          CONSTRAINT [PK_Esclade] PRIMARY KEY ([Id]),
          CONSTRAINT [FK_Esclade_EntitesSupports_EntiteSupportId] FOREIGN KEY ([EntiteSupportId]) REFERENCES [EntitesSupports] ([Id]) ON DELETE CASCADE,
          CONSTRAINT [FK_Esclade_Incidents_IncidentId] FOREIGN KEY ([IncidentId]) REFERENCES [Incidents] ([Id]) ON DELETE CASCADE
      );
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (6ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_AgentIncident_IncidentId] ON [AgentIncident] ([IncidentId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Agents_EntiteId] ON [Agents] ([EntiteId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (2ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Agents_UtilisateurId] ON [Agents] ([UtilisateurId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Contacts_CompteId] ON [Contacts] ([CompteId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Esclade_EntiteSupportId] ON [Esclade] ([EntiteSupportId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Esclade_IncidentId] ON [Esclade] ([IncidentId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (5ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Factures_ServiceId] ON [Factures] ([ServiceId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Incidents_CanalId] ON [Incidents] ([CanalId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Incidents_ContactId] ON [Incidents] ([ContactId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Incidents_EntiteSupportId] ON [Incidents] ([EntiteSupportId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Incidents_MotifId] ON [Incidents] ([MotifId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Incidents_PrioriteId] ON [Incidents] ([PrioriteId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Incidents_ServiceId] ON [Incidents] ([ServiceId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Incidents_SousMotifId] ON [Incidents] ([SousMotifId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Incidents_TeleconseillerId] ON [Incidents] ([TeleconseillerId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (8ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Services_TypeServiceId] ON [Services] ([TypeServiceId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Teleconseillers_PrestataireId] ON [Teleconseillers] ([PrestataireId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_Teleconseillers_UtilisateurId] ON [Teleconseillers] ([UtilisateurId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_UserLogins_UserId] ON [UserLogins] ([UserId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (1ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      CREATE INDEX [IX_UserRoles_RoleId] ON [UserRoles] ([RoleId]);
Microsoft.EntityFrameworkCore.Database.Command[20101]
      Executed DbCommand (11ms) [Parameters=[], CommandType='Text', CommandTimeout='30']
      INSERT INTO [__EFMigrationsHistory] ([MigrationId], [ProductVersion])
      VALUES (N'20240725161101_InitialCreate', N'8.0.6');