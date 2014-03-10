# == Class: role::accountinfo
# The AccountInfo extension allows users to look at private information
# that is stored about them. It also includes the CheckUser extension,
# which AccountInfo integrates with.
class role::accountinfo {
    include role::mediawiki

    mediawiki::extension { 'CheckUser':
        needs_update => true,
    }

    mediawiki::extension { 'AccountInfo':
        settings => { 'wgPutIPinRC' => true, },
        require  => Mediawiki::Extension['CheckUser'],
    }
}
