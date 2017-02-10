stage('Build') {
    build(
        job: 'php-src/build', 
        parameters: [
            string(name: 'BRANCH', value: BRANCH_NAME), 
            booleanParam(name: 'DEBUG', value: false), 
            booleanParam(name: 'MAINTAINERZTS', value: false)
        ]
    );
}
stage('php-src Tests') {
    build(
        job: 'php-src/src-tests', 
        parameters: [
            string(name: 'BRANCH', value: BRANCH_NAME)
        ]
    );
}
if (BRANCH_NAME == 'master') {
    stage('php-langspec Tests') {
        build(
            job: 'php-langspec/langspec-tests', 
            parameters: [
                string(name: 'BRANCH', value: BRANCH_NAME)
            ]
        );
    }
}