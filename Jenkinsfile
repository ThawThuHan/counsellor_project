pipeline {
    agent any

    stages {
        stage('Build') {
            steps {
                // Get some code from a GitHub repository
                git credentialsId: 'GitHub', url: 'https://github.com/ThawThuHan/counsellor_project.git', branch: 'main'
            }
        }
        stage('check file') {
            steps {
                sh 'ls -l'
            }
        }
        stage('build Dockerfile') {
            steps {
                sshagent(['counsellor-server']) {
                    sh '''
                        ssh -o StrictHostKeyChecking=no msis@192.168.59.69 "rm -rf counsellor_project"
                        scp -r $(pwd) msis@192.168.59.69:~/.
                        ssh -o StrictHostKeyChecking=no msis@192.168.59.69 "cd counsellor_project && docker build -t counsellor ."
                        ssh -o StrictHostKeyChecking=no msis@192.168.59.69 "docker inspect counsellor >/dev/null 2&>1 && docker rm -f counsellor"
                        ssh -o StrictHostKeyChecking=no msis@192.168.59.69 "docker run -d --name counsellor -p 30005:80 counsellor"
                    '''
                    //sh 'ssh -o StrictHostKeyChecking=no msis@192.168.59.69 "rm -rf counsellor_project"'
                    //sh 'scp -r $(pwd) msis@192.168.59.69:~/.'
                    //sh 'ssh -o StrictHostKeyChecking=no msis@192.168.59.69 "cd counsellor_project && docker build -t counsellor ."'
                    //sh 'ssh -o StrictHostKeyChecking=no msis@192.168.59.69 "docker inspect counsellor >/dev/null 2&>1 && docker rm -f counsellor"'
                    ////sh 'ssh -o StrictHostKeyChecking=no msis@192.168.59.69 "docker stop counsellor && docker rm counsellor"'
                    //sh 'ssh -o StrictHostKeyChecking=no msis@192.168.59.69 "docker run -d --name counsellor -p 30005:80 counsellor"'
                }
            }
        }
    }
    post {
        always {
            cleanWs()
        }
    }
}
