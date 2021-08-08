/* CRIA ESQUEMA */
CREATE SCHEMA clinica;

/* USA ESQUEMA PARA CONSEGUIR CRIAR TABLEAS*/
USE clinica;

/* LARAVEL DEFAULT */
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* TABELA DE MIGRACOES LARAVEL->MYSQL - LARAVEL DEFAULT */
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');

/* TABELA DE TOKEN DE ESQUECI A SENHA -LARAVEL DEFAULT*/
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* TABELA DE USUARIOS (DA CLINICA) - LARAVEL DEFAULT*/
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin` bigint(1) unsigned DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`,`admin`, `created_at`, `updated_at`) VALUES ('1', 'Luiz Felipe Designer', 'admin@material.com', '2021-05-24 19:29:57', '$2y$10$mm4x8QsoVN36FjbZr.ZtHOmWwXQ1nx7Gwi3FRCwntN1UwV22.rIxa', 'Gt3bWmBWrfMVAUOwC8RAgvTEhIRpoverkuB0JHkcOhLS9Mco40Yx3DkUJEl8',1, '2021-05-24 19:29:57', '2021-05-24 19:29:57');

/* TABELA DE CREDENCIADOS (DONOS DO PET) */
CREATE TABLE `credenciado` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fantasia` varchar(255) COLLATE utf8mb4_unicode_ci,
  `cnpj` varchar(20) COLLATE utf8mb4_unicode_ci,
  `telefone` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8mb4_unicode_ci,
  `cep` varchar(15) COLLATE utf8mb4_unicode_ci,
  `numero` bigint(10) unsigned,
  `complemento` varchar(255) COLLATE utf8mb4_unicode_ci,
  `bairro` varchar(255) COLLATE utf8mb4_unicode_ci,
  `cidade` varchar(255) COLLATE utf8mb4_unicode_ci,
  `estado` varchar(255) COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `credenciado` (`name`, `fantasia`, `cnpj`, `telefone`, `email`, `endereco`, `cep`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES ('Jheniffer', 'JC cerimonial', '47.478.701/0001-02', '(43) 9999-9999', 'jheniffer@gmail.com', 'Rua dos bobos', '83708320', '173', 'Casa', 'Bairro', 'Londrina', 'PR');
INSERT INTO `credenciado` (`name`, `fantasia`, `cnpj`, `telefone`, `email`, `endereco`, `cep`, `numero`, `complemento`, `bairro`, `cidade`, `estado`) VALUES ('Wellington Luiz', 'WJ Solucoes', '47.478.701/0001-02', '(43) 9999-9999', 'wellington@gmail.com', 'Rua dos bobos', '83708320', '173', 'Casa', 'Bairro', 'Londrina', 'PR');

/* TABELA AUXILIAR DE PROCEDIMENTOS PARA O SELECT */
CREATE TABLE `plano` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `plano` (`name`) VALUES ('Contrato Básico Cães');
INSERT INTO `plano` (`name`) VALUES ('Vip2');

/* TABELA AUXILIAR DE PROCEDIMENTOS PARA O SELECT */
CREATE TABLE `plano_carencia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `plano_id` bigint(20) unsigned NOT NULL,
  `procedimento_id` bigint(20) unsigned NOT NULL,
  `carencia` bigint(20) unsigned DEFAULT 0,
  `limite` bigint(20) unsigned DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* TABELA DE PACIENTES (PETS) */
CREATE TABLE `pet` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `credenciado_id` bigint(20) unsigned NOT NULL,
  `plano_id` bigint(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raca` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `especie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aniversario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `microchip` bigint(20) unsigned NOT NULL,
  `status` bigint(1) unsigned DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(credenciado_id) REFERENCES credenciado(id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `pet` (`credenciado_id`, `name`, `raca`,`especie`,`aniversario`,`microchip`, `plano_id`) VALUES ('1', 'Alice', 'White','Humana','Julho de 2020','92183981.2131231', 1);
INSERT INTO `pet` (`credenciado_id`, `name`, `raca`,`especie`,`aniversario`,`microchip`, `plano_id`) VALUES ('1', 'Julia', 'White','Humana','Julho de 2020','92183981.2131231', 1);
INSERT INTO `pet` (`credenciado_id`, `name`, `raca`,`especie`,`aniversario`,`microchip`, `plano_id`) VALUES ('1', 'Helena', 'White','Humana','Julho de 2020','92183981.2131231', 1);

/* TABELA AUXILIAR DE PROCEDIMENTOS PARA O SELECT */
CREATE TABLE `procedimento` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `procedimento` (`name`) VALUES ('Consulta pediátrica');
INSERT INTO `procedimento` (`name`) VALUES ('Atendimento odontológico');
INSERT INTO `procedimento` (`name`) VALUES ('Aplicação de medicação e vacina');
INSERT INTO `procedimento` (`name`) VALUES ('Corte de unha');
INSERT INTO `procedimento` (`name`) VALUES ('Fluidoterapia subcutânea');
INSERT INTO `procedimento` (`name`) VALUES ('Curativos – ataduras e imobilização');
INSERT INTO `procedimento` (`name`) VALUES ('Coleta de exames');
INSERT INTO `procedimento` (`name`) VALUES ('Administração de medicamento via oral');



/* TABELA DE PRONTUARIO DE UM PACIENTE */
CREATE TABLE `prontuario` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `procedimento_id` bigint(20) unsigned NOT NULL,
  `pet_id` bigint(20) unsigned NOT NULL,
  `guia_id` bigint(20) unsigned,
  `prontuario_status` bigint(20) unsigned NOT NULL,
  `qtd` bigint(20) unsigned NOT NULL,
  `obs` varchar(255) COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY(pet_id) REFERENCES pet(id),
  FOREIGN KEY(procedimento_id) REFERENCES procedimento(id)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* TABELA DE PRONTUARIO DE UM PACIENTE */
CREATE TABLE `guia` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `pet_id` bigint(20) unsigned NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci, 
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/* TABELA AUXILIAR DE PROCEDIMENTOS PARA O SELECT */
CREATE TABLE `banners` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
