pipeline {
    agent any 
    stages {
        stage('Stage 1') {
            steps {
                echo 'Hello Dipendu, Auto deployment was successful.' 
            }
        }
    }
    post {
        always {
            emailext body: 'Jenkins completed a build for LumenApiGateway project', recipientProviders: [[$class: 'DevelopersRecipientProvider'], [$class: 'RequesterRecipientProvider']], subject: 'Test'
        }
    }
}
