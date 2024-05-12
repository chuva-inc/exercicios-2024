// GENERATED CODE - DO NOT MODIFY BY HAND

part of 'person.dart';

// **************************************************************************
// JsonSerializableGenerator
// **************************************************************************

Person _$PersonFromJson(Map<String, dynamic> json) => Person(
      id: json['id'] as int,
      title: json['title'] as String? ?? '',
      name: json['name'] as String? ?? '',
      institution: json['institution'] as String? ?? '',
      bio: json['bio'] == null
          ? null
          : Bio.fromJson(json['bio'] as Map<String, dynamic>),
      picture: json['picture'] as String? ?? '',
      weight: json['weight'] as int? ?? 0,
      role: json['role'] == null
          ? null
          : Role.fromJson(json['role'] as Map<String, dynamic>),
      hash: json['hash'] as String? ?? '',
    );

Map<String, dynamic> _$PersonToJson(Person instance) => <String, dynamic>{
      'id': instance.id,
      'title': instance.title,
      'name': instance.name,
      'institution': instance.institution,
      'bio': instance.bio,
      'picture': instance.picture,
      'weight': instance.weight,
      'role': instance.role,
      'hash': instance.hash,
    };
