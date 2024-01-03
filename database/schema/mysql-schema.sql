/*!40103 SET @OLD_TIME_ZONE = @@TIME_ZONE */;
/*!40103 SET TIME_ZONE = '+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS, UNIQUE_CHECKS = 0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS = 0 */;
/*!40101 SET @OLD_SQL_MODE = @@SQL_MODE, SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES = @@SQL_NOTES, SQL_NOTES = 0 */;
DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs`
(
    `id`         BIGINT UNSIGNED                         NOT NULL AUTO_INCREMENT,
    `uuid`       VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `connection` TEXT COLLATE utf8mb4_unicode_ci         NOT NULL,
    `queue`      TEXT COLLATE utf8mb4_unicode_ci         NOT NULL,
    `payload`    LONGTEXT COLLATE utf8mb4_unicode_ci     NOT NULL,
    `exception`  LONGTEXT COLLATE utf8mb4_unicode_ci     NOT NULL,
    `failed_at`  TIMESTAMP                               NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (`id`),
    UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations`
(
    `id`        INT UNSIGNED                            NOT NULL AUTO_INCREMENT,
    `migration` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `batch`     INT                                     NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens`
(
    `email`      VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token`      VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `created_at` TIMESTAMP                               NULL DEFAULT NULL,
    PRIMARY KEY (`email`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `personal_access_tokens`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `personal_access_tokens`
(
    `id`             BIGINT UNSIGNED                         NOT NULL AUTO_INCREMENT,
    `tokenable_type` VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `tokenable_id`   BIGINT UNSIGNED                         NOT NULL,
    `name`           VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `token`          VARCHAR(64) COLLATE utf8mb4_unicode_ci  NOT NULL,
    `abilities`      TEXT COLLATE utf8mb4_unicode_ci,
    `last_used_at`   TIMESTAMP                               NULL DEFAULT NULL,
    `expires_at`     TIMESTAMP                               NULL DEFAULT NULL,
    `created_at`     TIMESTAMP                               NULL DEFAULT NULL,
    `updated_at`     TIMESTAMP                               NULL DEFAULT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
    KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`, `tokenable_id`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users`
(
    `id`                BIGINT UNSIGNED                         NOT NULL AUTO_INCREMENT,
    `name`              VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email`             VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `email_verified_at` TIMESTAMP                               NULL DEFAULT NULL,
    `password`          VARCHAR(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `remember_token`    VARCHAR(100) COLLATE utf8mb4_unicode_ci      DEFAULT NULL,
    `created_at`        TIMESTAMP                               NULL DEFAULT NULL,
    `updated_at`        TIMESTAMP                               NULL DEFAULT NULL,
    `role_id`           SMALLINT                                NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY `users_email_unique` (`email`)
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4
  COLLATE = utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;
/*!40103 SET TIME_ZONE = @OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE = @OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES = @OLD_SQL_NOTES */;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (2, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`)
VALUES (4, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES (5, '2024_01_03_191327_add_user_roles', 1);
