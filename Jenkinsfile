pipeline {
  agent any
  stages {
    stage('CheckOut Code') {
      steps {
        git(url: 'https://github.com/ThawThuHan/counsellor_project', branch: 'main')
      }
    }

    stage('log files') {
      steps {
        sh 'ls -la'
      }
    }

  }
}