FROM maven:3.9.6-eclipse-temurin-8 AS build
WORKDIR /workspace

COPY pom.xml .
COPY src ./src

RUN mvn -B clean package -DskipTests

FROM eclipse-temurin:8-jre
WORKDIR /app

COPY --from=build /workspace/target/*-SNAPSHOT.jar app.jar

EXPOSE 8080

ENV JAVA_OPTS=""

ENTRYPOINT ["sh", "-c", "java $JAVA_OPTS -jar /app/app.jar"]
