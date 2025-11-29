/*
 * Copyright (c) 2017. Group 15, PJ-3100, Westerdals Oslo ACT
 */

package no.westerdals.pj3100g15.DBService;

import com.j256.ormlite.jdbc.JdbcConnectionSource;
import com.j256.ormlite.jdbc.JdbcPooledConnectionSource;
import com.j256.ormlite.support.ConnectionSource;
import no.westerdals.pj3100g15.ServerLogging.WriteLogg;

import java.io.FileReader;
import java.util.Properties;

public class DBConnector {

    /**
     * This method generates the connection to the database.
     * @return ConnectionSource - A timed connection to the database based on a String username, String password and a String url.
     */
    public static ConnectionSource makeConnection() {

        String userName = getEnvOrDefault("DB_USER", "dnb_user");
        String password = getEnvOrDefault("DB_PASSWORD", "dnb_pass");
        String host = getEnvOrDefault("DB_HOST", "localhost");
        String port = getEnvOrDefault("DB_PORT", "3306");
        String database = getEnvOrDefault("DB_NAME", "dnb_z");
        String databaseUrl = "jdbc:mysql://" + host + ":" + port + "/" + database;

        return connectToDatabase(userName, password, databaseUrl);
    }

    /**
     * This method creates a connectionsource with a timelimit for 5 minutes from a JdbcPooledConnectionSource.
     * The Connectionsource will automaticly get destroyed after 5 minutes. The access of the method is private.
     *
     * @param user        A String with the name of the user connected to the database
     * @param password    A String with the password for the database
     * @param databaseUrl The url to a specific database
     * @return returns a connectionsource-object that makes it possible to talk to the database.
     */
    private static ConnectionSource connectToDatabase(String user, String password, String databaseUrl) {
        try {
            JdbcPooledConnectionSource connectionSource =
                    new JdbcPooledConnectionSource(databaseUrl, user, password);
            //Makes the connectionsource close automaticly after 5 minutes.
            connectionSource.setMaxConnectionAgeMillis(5 * 60 * 1000);
            return connectionSource;
        } catch (Exception e) {
            WriteLogg.writeLogg(e);
            e.printStackTrace();
        }
        return null;
    }

    private static String getEnvOrDefault(String key, String defaultValue) {
        String value = System.getenv(key);
        if (value == null || value.trim().isEmpty()) {
            return defaultValue;
        }
        return value.trim();
    }
}
