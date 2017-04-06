FROM mercuriete/sonar-scanner

WORKDIR /opt/project
CMD sonar-scanner -Dsonar.host.url=$SONAR_HOST_URL -Dsonar.projectKey=$SONAR_PROJECT_KEY -Dsonar.projectName=$SONAR_PROJECT_NAME -Dsonar.projectVersion=$SONAR_PROJECT_VERSION -Dsonar.sources=/opt/project/src/Blog