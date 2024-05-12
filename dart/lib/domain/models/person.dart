import 'package:chuva_dart/data/models/bio.dart';
import 'package:chuva_dart/data/models/role.dart';
import 'package:json_annotation/json_annotation.dart';

part 'person.g.dart';

@JsonSerializable()
class Person {
  final int id;
  @JsonKey(defaultValue: "")
  final String? title;
  @JsonKey(defaultValue: "")
  final String? name;
  @JsonKey(defaultValue: "")
  final String? institution;
  final Bio? bio;
  @JsonKey(defaultValue: "")
  final String? picture;
  @JsonKey(defaultValue: 0)
  final int? weight;
  final Role? role;
  @JsonKey(defaultValue: "")
  final String? hash;

  Person({
    required this.id,
    required this.title,
    required this.name,
    required this.institution,
    required this.bio,
    required this.picture,
    required this.weight,
    required this.role,
    required this.hash,
  });

  factory Person.fromJson(Map<String, dynamic> json) => _$PersonFromJson(json);
  Map<String, dynamic> toJson() => _$PersonToJson(this);
}

